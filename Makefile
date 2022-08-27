console = symfony console
compose = composer

##--------------✨ Project ✨--------------
.PHONY: help
help: ## Help
	@grep -E '(^[a-zA-Z0-9_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}{printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'

.PHONY: init
init: ## Install project
	@echo '\033[1;42m The .env.local was just created. Feel free to put your config in it.\033[0m';
	@cp -n ./.env ./.env.local;

.PHONY: reset
reset: ## Reset project
	$(MAKE) db-reset
	symfony console app:fetch-quran

.PHONY: lint-all
lint-all: lint-cs lint-ps lint-es lint-twig lint-doctrine ## Lint project

.PHONY: fix-all
fix-all: fix-cs fix-ps ## Fix project

##--------------✨ Database ✨--------------
.PHONY: db-diff
db-diff: ## Database diff
	${console} doctrine:schema:update --dump-sql

.PHONY: db-reset
db-reset: ## Database reset
	${console} d:d:d --force --if-exists
	${console} d:d:c --if-not-exists
	${console} d:s:c --dump-sql
	${console} d:s:c

##--------------✨ Composer ✨--------------
.PHONY: composer-install
composer-install: ## Composer install
	symfony composer install

.PHONY: composer-update
composer-update: ## Composer update
	symfony composer update

##--------------✨ Coding standards ✨--------------
.PHONY: lint-cs
lint-cs: ## PHP CS Fixer analyzer
	symfony php ./vendor/bin/php-cs-fixer fix --dry-run -v

.PHONY: lint-ps
lint-ps: ## Psalm analyzer
	symfony php ./vendor/bin/psalm

.PHONY: lint-es
lint-es: ## ESLint analyzer
	./node_modules/.bin/eslint assets

.PHONY: lint-twig
lint-twig: ## Linting Twig Templates
	symfony console lint:twig

.PHONY: lint-doctrine
lint-doctrine: ## Validate the mappings
	symfony console doctrine:schema:validate

.PHONY: fix-cs
fix-cs: ## Execute PHP CS Fixer
	symfony php ./vendor/bin/php-cs-fixer fix

.PHONY: fix-ps
fix-ps: ## Execute Psalm
	symfony php ./vendor/bin/psalter --issues=all

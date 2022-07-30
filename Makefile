console = symfony console
compose = composer

##--------------✨ Project ✨--------------
.PHONY: help
help: ## help
	@grep -E '(^[a-zA-Z0-9_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}{printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'

.PHONY: init
init: ## Install project
	@echo '\033[1;42m The .env.local was just created. Feel free to put your config in it.\033[0m';
	@cp -n ./.env ./.env.local;

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
.PHONY: cs-check
cs-check: ## PHP CS Fixer analyzer
	symfony php ./vendor/bin/php-cs-fixer fix src --dry-run -v

.PHONY: ps-check
ps-check: ## Psalm analyzer
	symfony php ./vendor/bin/psalm

.PHONY: es-check
es-check: ## ESLint analyzer
	./node_modules/.bin/eslint assets

.PHONY: cs-fix
cs-fix: ## Execute PHP CS Fixer
	symfony php ./vendor/bin/php-cs-fixer fix

.PHONY: ps-fix
ps-fix: ## Execute Psalm
	symfony php ./vendor/bin/psalter --issues=all

.PHONY: lint-all
lint-all: ## Lint project
	cs-check ps-check

.PHONY: fix-all
fix-all: ## Fix project
	cs-fix ps-fix

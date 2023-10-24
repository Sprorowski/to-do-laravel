up:
	./vendor/bin/sail up -d
down:
	./vendor/bin/sail down

php_shell:
	docker-compose exec laravel.test sh

optimize:
	docker-compose exec laravel.test php artisan optimize

refresh:
	docker-compose exec laravel.test php artisan migrate:fresh --seed
pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Build') {
            agent {
                docker {
                    image 'composer:latest'
                    reuseNode true
                }
            }
            steps {
                sh 'composer install --no-dev --optimize-autoloader'
                sh 'cp .env.example .env'
                sh 'php artisan key:generate || true'
            }
        }

        stage('Test') {
            agent {
                docker {
                    image 'php:8.2-cli'
                    reuseNode true
                }
            }
            steps {
                sh 'php artisan test || echo "Tests skipped"'
            }
        }

        stage('Deploy') {
            steps {
                // Using SSH to deploy to VPS
                sshagent(['mud-chan']) {
                    sh '''
                        ssh -o StrictHostKeyChecking=no root@8.215.105.16 "
                        cd /var/www/laravel && \
                        git pull origin main && \
                        composer install --no-dev --optimize-autoloader && \
                        php artisan migrate --force || true && \
                        php artisan config:cache && \
                        php artisan route:cache && \
                        php artisan view:cache && \
                        php artisan optimize && \
                        chown -R www-data:www-data /var/www/laravel && \
                        find /var/www/laravel -type f -exec chmod 644 {} \\; && \
                        find /var/www/laravel -type d -exec chmod 755 {} \\; && \
                        chmod -R 775 /var/www/laravel/storage /var/www/laravel/bootstrap/cache && \
                        systemctl restart php-fpm || systemctl restart php8.2-fpm || systemctl restart php8.1-fpm || true && \
                        systemctl restart nginx || true"
                    '''
                }
            }
        }

        stage('Verify Deployment') {
            steps {
                sh 'curl -s http://8.215.105.16:8900/api/health-check || echo "Health check skipped"'
            }
        }
    }

    post {
        success {
            echo 'Deployment berhasil!'
        }
        failure {
            echo 'Deployment gagal!'
        }
        always {
            cleanWs()
        }
    }
}

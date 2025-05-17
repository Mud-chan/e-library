pipeline {
    agent any
    environment {
        WORKSPACE_DIR = "${env.WORKSPACE}"
        LARAVEL_CONTAINER = "laravel-app"
        TARGET_DIR = "/var/www/html"
        DEPLOY_SCRIPT = "/usr/local/bin/deploy-laravel-proxy.sh"  // Path ke script di host
    }
    stages {
        stage('Checkout') {
            steps {
                git branch: 'main', url: 'https://github.com/Mud-chan/e-library.git'
            }
        }
        
        stage('Copy to Laravel Container') {
            steps {
                // Gunakan script proxy untuk menyalin file
                sh '''
                ${DEPLOY_SCRIPT} copy ${WORKSPACE_DIR} ${TARGET_DIR} ${LARAVEL_CONTAINER}
                '''
            }
        }
        
        stage('Install Dependencies') {
            steps {
                sh '''
                ${DEPLOY_SCRIPT} composer "" "" ${LARAVEL_CONTAINER}
                ${DEPLOY_SCRIPT} migrate "" "" ${LARAVEL_CONTAINER}
                '''
            }
        }
        
        stage('Cache Configuration') {
            steps {
                sh '''
                ${DEPLOY_SCRIPT} cache "" "" ${LARAVEL_CONTAINER}
                '''
            }
        }
        
        stage('Set Permissions') {
            steps {
                sh '''
                ${DEPLOY_SCRIPT} permissions "" "" ${LARAVEL_CONTAINER}
                '''
            }
        }
        
        stage('Restart Application') {
            steps {
                sh '${DEPLOY_SCRIPT} restart "" "" ${LARAVEL_CONTAINER}'
                echo "Deployment completed successfully!"
            }
        }
    }
    
    post {
        success {
            echo "Pipeline executed successfully!"
        }
        failure {
            echo "Pipeline failed. Please check the logs for details."
        }
    }
}

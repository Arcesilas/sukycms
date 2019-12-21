<?php
namespace Deployer;

use Symfony\Component\Console\Input\InputArgument;

require 'recipe/laravel.php';

set('application', 'sukycms');
set('repository', 'git@github.com:sukycms/sukycms.git');
set('git_tty', true);

add('shared_files', []);
add('shared_dirs', []);

add('writable_dirs', []);

option('skip-build', null, InputArgument::OPTIONAL, 'Skip NPM build', false);

host('sukycms.com')
    ->stage('dev')
    ->set('deploy_path', '/var/www/sukycms/{{application}}-dev');

task('npm', function () {
    if (! input()->getOption('skip-build')) {
        runLocally('yarn run prod');
    }
    upload('public/build', '{{release_path}}/public');
    upload('public/mix-manifest.json', '{{release_path}}/public');
});

task('reload:php-fpm', function () {
    run('sudo /usr/sbin/service php7.4-fpm reload');
});

after('deploy:failed', 'deploy:unlock');
after('deploy:vendors', 'npm');
after('deploy', 'reload:php-fpm');
after('deploy:failed', 'deploy:unlock');
before('deploy:symlink', 'artisan:migrate');


module.exports = function (grunt) {

    require('load-grunt-tasks')(grunt, {scope: 'devDependencies'});
    grunt.loadNpmTasks('grunt-shell');

    grunt.initConfig({
        shell: {
            init: {
                command: 'npm install',
                command: 'composer update'
            },
            test: {
                command: 'vendor\\bin\\tester tests -s -p php'
            },
            netteCodeChecker: {
                command: 'php ..\\..\\nette-code-checker\\src\\code-checker.php -d src --short-arrays --strict-types',
            },
            netteCodeCheckerFIX: {
                command: 'php ..\\..\\nette-code-checker\\src\\code-checker.php -d src --short-arrays --strict-types --fix',
            },
            netteCodingStandard: {
                command: 'php ..\\..\\nette-coding-standard\\ecs check src tests --config ..\\..\\nette-coding-standard\\coding-standard-php71.neon'
            },
            netteCodingStandardFIX: {
                command: 'php ..\\..\\nette-coding-standard\\ecs check src tests --config ..\\..\\nette-coding-standard\\coding-standard-php71.neon --fix'
            },
            phpstan: {
                command: 'vendor\\bin\\phpstan analyse --level 7 src tests\\tests'
            }
        }
    });

    grunt.registerTask('installDependencies', ['shell:init']);
    grunt.registerTask('test', ['shell:test']);
    grunt.registerTask('netteCodeChecker', ['shell:netteCodeChecker']);
    grunt.registerTask('netteCodeCheckerFIX', ['shell:netteCodeCheckerFIX']);
    grunt.registerTask('netteCodingStandard', ['shell:netteCodingStandard']);
    grunt.registerTask('netteCodingStandardFIX', ['shell:netteCodingStandardFIX']);
    grunt.registerTask('phpstan', ['shell:phpstan']);

};

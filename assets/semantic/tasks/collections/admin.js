/*******************************
     Admin Task Collection
*******************************/

/*
  This are tasks to be run by project maintainers
  - Creating Component Repos
  - Syncing with GitHub via APIs
  - Modifying package files
*/

/*******************************
             Tasks
*******************************/


module.exports = function(gulp) {
  var
    // less/css distributions
    initComponents      = require('../str_lctr_admin/components/init'),
    createComponents    = require('../str_lctr_admin/components/create'),
    updateComponents    = require('../str_lctr_admin/components/update'),

    // single component releases
    initDistributions   = require('../str_lctr_admin/distributions/init'),
    createDistributions = require('../str_lctr_admin/distributions/create'),
    updateDistributions = require('../str_lctr_admin/distributions/update'),

    release             = require('../str_lctr_admin/release'),
    publish             = require('../str_lctr_admin/publish'),
    register            = require('../str_lctr_admin/register')
  ;

  /* Release */
  gulp.task('init distributions', 'Grabs each component from GitHub', initDistributions);
  gulp.task('create distributions', 'Updates files in each repo', createDistributions);
  gulp.task('init components', 'Grabs each component from GitHub', initComponents);
  gulp.task('create components', 'Updates files in each repo', createComponents);

  /* Publish */
  gulp.task('update distributions', 'Commits component updates from create to GitHub', updateDistributions);
  gulp.task('update components', 'Commits component updates from create to GitHub', updateComponents);

  /* Tasks */
  gulp.task('release', 'Stages changes in GitHub repos for all distributions', release);
  gulp.task('publish', 'Publishes all releases (components, package)', publish);
  gulp.task('register', 'Registers all packages with NPM', register);

};
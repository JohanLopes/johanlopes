#############################################################
#   Servers
#############################################################

set :application,       "johanlopes"
set :domain,            "uranus.creative-nao.fr"
set :user,              "jlopes"
set :app_path,          "app"
set :app_web,           "web"
set :deploy_to,         "/home/#{application}.fr"
set :group_writable,    true

role :web,        domain                         # Your HTTP server, Apache/etc
role :app,        domain                         # This may be the same as your `Web` server
role :db,         domain, :primary => true       # This is where Rails migrations will run

#############################################################
#   SCM
#############################################################

set :scm,           :git
set :scm_username,  "git"
set :repository,    "git@github.com:JohanLopes/#{application}.git"
set :branch,        "master"
set :deploy_via,    :remote_cache
set :scm_verbose,   true

#############################################################
#   Config
#############################################################

set :use_composer,          true
set :dump_assetic_assets,   true
set :clear_controllers,     false

set :shared_files,          ["app/config/parameters.yml"]
set :shared_children,       [app_path + "/logs", web_path + "/uploads", web_path + "/media", "vendor"]

set :use_sudo,              false
set :keep_releases,         3
set :php_bin,               '/usr/local/zend/bin/php'

ssh_options[:forward_agent] = true
default_run_options[:pty]   = true

#############################################################
# TASKS
#############################################################

after :deploy, 'deploy:cleanup'

# Be more verbose by uncommenting the following line
logger.level = Logger::MAX_LEVEL

#############################################################
#   Servers
#############################################################

set :application,       "johanlopes"
set :domain,            "wolverine.johanlopes.fr"
set :user,              "jlopes"
set :app_path,          "app"
set :app_web,           "web"
set :deploy_to,         "/var/www/#{application}"
set :group_writable,    true

set :webserver_user,        "www-data"
set :permission_method,     :acl
set :use_set_permissions,   true

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
set :copy_vendors, 			true
set :dump_assetic_assets,   true
set :clear_controllers,     true

set :writable_dirs,         ["app/cache", "app/logs", "web/media", "web/uploads"]
set :shared_files,          ["app/config/parameters.yml"]
set :shared_children,       [app_path + "/logs", web_path + "/uploads", web_path + "/media"]

set :use_sudo,              false
set :keep_releases,         5

ssh_options[:forward_agent] = true
default_run_options[:pty]   = true

#############################################################
# TASKS
#############################################################

after :deploy, 'deploy:cleanup'

# Be more verbose by uncommenting the following line
logger.level = Logger::MAX_LEVEL

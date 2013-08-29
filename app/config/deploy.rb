#############################################################
#   Servers
#############################################################

set :application,       "johanlopes"
set :domain,            "uranus.creative-nao.fr"
set :user,              "jlopes"
set :deploy_to,         "/home/#{application}.fr"
set :group_writable,    true

#############################################################
#   SCM
#############################################################
 
set :scm,           :git
set :scm_username,  "git"
set :repository,    "git@#{domain}:#{application}.git"
set :branch,        "master"
set :deploy_via,    :remote_cache
set :scm_verbose,   true

role :web,        domain                         # Your HTTP server, Apache/etc
role :app,        domain                         # This may be the same as your `Web` server
role :db,         domain, :primary => true       # This is where Rails migrations will run

#############################################################
#   Config
#############################################################

set :model_manager,         "doctrine"
set :update_vendors,        true
set :vendors_mode,          "install"
set :git_enable_submodules, true
set :dump_assetic_assets,   true
 
set :shared_files,          ["app/config/parameters.ini"]
set :shared_children,       [app_path + "/logs", web_path + "/uploads", web_path + "/media", "vendor"]

set :use_sudo,              false
set :keep_releases,         3
set :php_bin,               '/usr/local/zend/bin/php' 

ssh_options[:forward_agent] = true

#############################################################
# TASKS
#############################################################
 
after :deploy, 'deploy:cleanup'

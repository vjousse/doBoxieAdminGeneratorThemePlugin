doBoxieAdminGeneratorThemePlugin
========================================================

Overview
--------

This is a symfony admin generator theme based on the [Boxie theme by gwaihir](http://themeforest.net/item/boxie-admin/74076)


Requirements
------------

You'll have to buy the theme on Theme Forest to be able to use this plugin.
It's cheap and it's good quality, so don't hesitate ! You can buy it at [Theme Forest](http://themeforest.net/item/boxie-admin/74076)


Installation
------------

Enable it in `config/ProjectConfiguration.class.php`

    [php]
    class ProjectConfiguration extends sfProjectConfiguration
    {
      public function setup()
      {
        $this->enablePlugins(array(
          'sfDoctrinePlugin', 
          'doBoxieAdminGeneratorThemePlugin',
          '...'
        ));
      }
    }

Publish your assets:

    $ php symfony plugin:publish-assets

Copying boxie files
-------------------

Put the content of the boxie css/ folder into a newly created dir web/doBoxieAdminGeneratorThemePlugin/css/boxie (you should have a css per color and an image directory)
Put the ddpng.js file into web/doBoxieAdminGeneratorThemePlugin/js/
You'll need jQuery for this theme, don't forget to include it somewhere in a view.yml


Usage
-----

You'll have to enable the theme in your generator.yml. You have to change the
theme value to boxieAdmin and the css value to the css you want (depending on the color).
For example, you could have a file like this:

    [yml]
    # in myproject/apps/frontend/modules/mymodule/config/generator.yml
    generator:
      class: sfDoctrineGenerator
      param:
        model_class:           sfGuardUser
        theme:                 boxieAdmin
        non_verbose_templates: true
        with_show:             false
        singular:              ~
        plural:                ~
        route_prefix:          sf_guard_user
        with_doctrine_route:   true
        css:                   /doBoxieAdminGeneratorThemePlugin/css/boxie/blue.css

        ....

Global Layout
-------------

I've provided two examples of layout in doBoxieAdminGeneratorThemePlugin/layout.
Global is the layout for your application, login is the layout for the login page.

To add the layout to your login page when you're using sfDoctrineGuardPlugin, copy doBoxieAdminGeneratorThemePlugin/layout/login.php to apps/backend/templates/.
Then create apps/backend/sfGuardAuth/ and apps/backend/sfGuardAuth/config/ directories and put a view.yml inside the last one:

    [yml]
    # in myproject/apps/backend/sfGuardAuth/config/view.yml
    all:
      layout: login
      stylesheets:
        - /doBoxieAdminGeneratorThemePlugin/css/boxie/blue.css

Just do the same for the global layout by changing apps/backend/config/view.yml

Feel free to modify and contribute !

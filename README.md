CONTENTS OF THIS FILE

    Introduction
    Requirements
    Installation
    Configuration
    Troubleshooting
    Maintainers


INTRODUCTION

This module implements the Instamojo Payment Gateway in Drupal Commerce. Instamojo lets you collect payments instantly. You start simply by creating a link by adding details. Share with your audience, through a link. And start collecting payments in minutes.


REQUIREMENTS

The modules required are:

    Commerce
    Commerce UI
    Order
    Rules
    Chaos tools
    Entity Token
    System
    Entity API
    Payment Order
    Customer
    Address Field
    Line Item
    Price


INSTALLATION

Install the Commerce Instamojo module as you would normally install a contributed Drupal module. Visit: for further information. Also take a look at this video on installing the module through git and URL.
Visit: https://youtu.be/T0aDHuAHWf4


CONFIGURATION

    After installing the module, go to Admin >> Commerce >> Configuration >> Payment Methods >> Instamojo for configuring the module.

    a) Enable - Instamojo Payment Gateway - payment method rule.

    b) Click on edit.

    c) In the Actions - click on edit next to - Enable payment method:

    Instamojo Payment Gateway

    d) Get your merchant account from Instamojo Payment Gateway. Enter following details in Payment Settings: 
    Api Key 
    Auth Token 
    Virtual Payment 
    Client Url (For this create payment link in Site URL (This is your site URL without last slash) Payment Api Url.

[Note: Site URL must be updated with your current drupal site URL (with NO trailing slash "/")]

    Clear cache - Go to - Admin >> Config >> Development >> Performance.

    Browse to Drupal permission page and allow Anonymous as well as Authenticated users to use Instamojo payment gateway

    Visit your payment URL page in Instamojo. Click to "Advance Settings" section on payment URL page At the Payment Gateway Set Return url as http://yoursite.com/response_page, Replace yoursite.com with your site URL.


TROUBLESHOOTING

If the module is not shown in the list try deleting the module and try cloning it again. or else try clearing the cache, and then try installing it.


MAINTAINERS

bhanuprakashnani(https://www.drupal.org/u/bhanuprakashnani)

Supporting Organizations:

    Valuebound(https://www.drupal.org/valuebound)
    Drupal BangaloreCommunity(https://www.drupal.org/drupal-bangalore-community)

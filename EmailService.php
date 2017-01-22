<?php


require 'vendor/autoload.php';

return call_user_func(function(){
   new \Services\EmailService();
});
<?php

/**
 * public actions.
 *
 * @package    sf_sandbox
 * @subpackage public
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class publicComponents extends sfComponents
{
    public function executeHeader()
    {
//        echo $request->getRemoteAddress();die;
    }
    
    public function executeFooter()
    {
        
    }
    public function executeNotification()
    {}
}

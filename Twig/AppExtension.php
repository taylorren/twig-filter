<?php
namespace AppBundle\Twig;

class AppExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('tss', [$this, 'tssFilter']),
        ];
    }
    
    public function tssFilter(\DateTime $timestamp)
    {
        $TSS=['刚刚','几分钟前','一个小时左右','十几个小时吧','也就一两天','有点年头了','火星贴'];
        $i=-1;
        $compared = new \DateTime();
        
        $ts1=$timestamp->getTimestamp();
        $co1=$compared->getTimestamp();
        
        $diff=$ts1-$co1;
        if($diff<0 )
        {
            $i++;
        }
        
        if($diff<-5*60 )
        {
            $i++;
        }
        
        if($diff<-60*60)
        {
            $i++;
        }
        
        if($diff<-16*60*60)
        {
            $i++;
        }
        
        if($diff<-24*60*60)
        {
            $i++;
        }
        
        if($diff<-3*24*60*60)
        {
            $i++;
        }
        
        if($diff<-10*24*60*60)
        {
            $i++;
        }

        return $TSS[$i];
    }
    
    public function getName()
    {
        return 'app_extension';
    }
}
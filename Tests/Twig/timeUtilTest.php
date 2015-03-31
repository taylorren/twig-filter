<?php

namespace AppBundle\Tests\Twig;
use AppBundle\Twig\AppExtension;

class timeUtilTest extends \PHPUnit_Framework_TestCase
{
    public function testtssFilter()
    {
        $tu = new AppExtension();
        
        $ts=new \DateTime();
        $ti=new \DateInterval("PT1M");
        $ts->sub($ti);
        $res=$tu->tssFilter($ts);
        
        $this->assertEquals($res, '刚刚');
        
        $ts=new \DateTime();
        $ti=new \DateInterval("PT2M");
        $ts->sub($ti);
        $res=$tu->tssFilter($ts);
        
        $this->assertEquals($res, '刚刚');
        
        $ts=new \DateTime();
        $ti=new \DateInterval("PT7M");
        $ts->sub($ti);
        $res=$tu->tssFilter($ts);
        
        $this->assertEquals($res, '几分钟前');
        
        $ts=new \DateTime();
        $ti=new \DateInterval("PT61M");
        $ts->sub($ti);
        $res=$tu->tssFilter($ts);
        
        $this->assertEquals($res, '一个小时左右');
        
        $ts=new \DateTime();
        $ti=new \DateInterval("PT16H1M");
        $ts->sub($ti);
        $res=$tu->tssFilter($ts);
        
        $this->assertEquals($res, '十几个小时吧');
        
        $ts=new \DateTime();
        $ti=new \DateInterval("P1DT2H2M");
        $ts->sub($ti);
        $res=$tu->tssFilter($ts);
        
        $this->assertEquals($res, '也就一两天');
        
        $ts=new \DateTime();
        $ti=new \DateInterval("P2DT2H2M");
        $ts->sub($ti);
        $res=$tu->tssFilter($ts);
        
        $this->assertEquals($res, '也就一两天');
        
        $ts=new \DateTime();
        $ti=new \DateInterval("P3DT2H2M");
        $ts->sub($ti);
        $res=$tu->tssFilter($ts);
        
        $this->assertEquals($res, '有点年头了');
        
        $ts=new \DateTime();
        $ti=new \DateInterval("P7DT2H2M");
        $ts->sub($ti);
        $res=$tu->tssFilter($ts);
        
        $this->assertEquals($res, '有点年头了');
        
        $ts=new \DateTime();
        $ti=new \DateInterval("P13DT2H2M");
        $ts->sub($ti);
        $res=$tu->tssFilter($ts);
        
        $this->assertEquals($res, '火星贴');
        
        


                
    }
}
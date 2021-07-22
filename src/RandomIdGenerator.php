<?php
namespace App;

class RandomIdGenerator implements LogTraceIdGenerator
{
    public function generate()
    {
        $hostName = $this->getLastfieldofHostName();

        return sprintf("%s-%d-%s",$hostName,time(),$this->rand_str(8));
    }
    //@VisibleForTesting
    private function getLastfieldofHostName()
    {
        $hostName = gethostname();

        return $this->getLastSubstrSplittedByDot($hostName);

    }

    private function getLastSubstrSplittedByDot($hostName)
    {
        $tokens = explode(".",$hostName);
        return end($tokens);
    }


    private function rand_str($randLength = 6, $addtime = 0, $includenumber = 0)
    {
        if ($includenumber) {
             $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHJKLMNPQEST123456789';
        } else {
             $chars = 'abcdefghijklmnopqrstuvwxyz';
       }
        $len = strlen($chars);
        $randStr = '';
       for ($i = 0; $i < $randLength; $i++) {
              $randStr .= $chars[mt_rand(0, $len - 1)];
        }
        $tokenvalue = $randStr;
       if ($addtime) {
               $tokenvalue = $randStr . time();
        }
        return $tokenvalue;
     }
}

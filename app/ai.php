<?php

class AI
{
    public static function process($text)
    {
        $result = [
            'gender' => self::getGender($text),
            'sentiment' => self::getSentiment($text),
            'rude_words' => self::getRudeWords($text),
            'languages' => self::getLanguages($text),
        ];
        return $result;
    }

    /**
     * @return string 'Male' or 'Female' or 'Unknown'
     */
    public static function getGender($text)
    {
        $male = array("ครับ","คับ","ครัช","ฮะ");
        $female = array("ค่ะ","จ่ะ","คะ","จ๋า","ขา");
        for($i=0;$i<sizeof($male);$i++){
            if (strpos($text,$male[$i])!==false)
            return 'Male';
        }
        
       
      
        for($i=0;$i<sizeof($female);$i++){
            if(strpos($text,$female[$i])!==false){
            return 'Female';
            }
            else{
            return 'Unknown';
            }
        }
        
    }

    /**
     * @return string 'Positive' or 'Neutral' or 'Negative'
     */
    public static function getSentiment($text)
    {
        if (strpos($text,"มีความสุข")!==false)
        return 'Positive';

        else if (strpos($text,"เซ็ง")!==false){
        return  'Neutral';   
        }
        else {
        return 'Negative';
        }
        
    }

    /**
     * @return array of all rude words in Thai
     */
    public static function getRudeWords($text)
    {
        if (strpos($text,"โง่")!==false)
        return ['โง่'];

        return ['test'];
    }

    /**
     * @return array of languages (TH, EN)
     */
    public static function getLanguages($text)
    {
        $result = [];
        $re = '/[ก-๛]+/u';
        preg_match_all($re, $text, $matches, PREG_SET_ORDER, 0);
        if (!empty($matches)) {
            array_push($result, 'TH');
        }

        $re = '/[a-z]+/u';
        preg_match_all($re, $text, $matches, PREG_SET_ORDER, 0);
        if (!empty($matches)) {
            array_push($result, 'EN');
        }
        return $result;
    }

}
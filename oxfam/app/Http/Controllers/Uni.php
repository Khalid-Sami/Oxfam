<?php
namespace App\Http\Controllers;
class Uni extends Controller
{
    public function word2uni($word)
    {

        $new_word = array();
        $char_type = array();
        $isolated_chars = array('ا', 'د', 'ذ', 'أ', 'آ', 'ر', 'ؤ', 'ء', 'ز', 'و', 'ى', 'ة');

        $all_chars = array
        (
            'ا' => array(

                'middle'		=>   'ﺎ',

                'isolated'		=>   'ﺍ'
            ),

            'ؤ' => array(

                'middle'		=>   'ﺅ',

                'isolated'		=>   'ﺆ'
            ),
            'ء' => array(
                'middle'		=>   'ﺀ',
                'isolated'		=>   'ﺀ'
            ),
            'أ' => array(

                'middle'		=>   'ﺄ',

                'isolated'		=>   'ﺃ'
            ),
            'آ' => array(

                'middle'		=>   'ﺂ',

                'isolated'		=>   'ﺁ'
            ),
            'ى' => array(

                'middle'		=>   'ﻰ',

                'isolated'		=>   'ﻯ'
            ),
            'ب' => array(
                'beginning'		=>   'ﺑ',
                'middle'		=>   'ﺒ',
                'end'			=>   'ﺐ',
                'isolated'		=>   'ﺏ'
            ),
            'ت' => array(
                'beginning'		=>   'ﺗ',
                'middle'		=>   'ﺘ',
                'end'			=>   'ﺖ',
                'isolated'		=>   'ﺕ'
            ),
            'ث' => array(
                'beginning'		=>   'ﺛ',
                'middle'		=>   'ﺜ',
                'end'			=>   'ﺚ',
                'isolated'		=>   'ﺙ'
            ),
            'ج' => array(
                'beginning'		=>   'ﺟ',
                'middle'		=>   'ﺠ',
                'end'			=>   'ﺞ',
                'isolated'		=>   'ﺝ'
            ),
            'ح' => array(
                'beginning'		=>   'ﺣ',
                'middle'		=>   'ﺤ',
                'end'			=>   'ﺢ',
                'isolated'		=>   'ﺡ'
            ),
            'خ' => array(
                'beginning'		=>   'ﺧ',
                'middle'		=>   'ﺨ',
                'end'			=>   'ﺦ',
                'isolated'		=>   'ﺥ'
            ),
            'د' => array(
                'middle'		=>   'ﺪ',
                'isolated'		=>   'ﺩ'
            ),
            'ذ' => array(
                'middle'		=>   'ﺬ',
                'isolated'		=>   'ﺫ'
            ),
            'ر' => array(
                'middle'		=>   'ﺮ',
                'isolated'		=>   'ﺭ'
            ),
            'ز' => array(
                'middle'		=>   'ﺰ',
                'isolated'		=>   'ﺯ'
            ),
            'س' => array(
                'beginning'		=>   'ﺳ',
                'middle'		=>   'ﺴ',
                'end'			=>   'ﺲ',
                'isolated'		=>   'ﺱ'
            ),
            'ش' => array(
                'beginning'		=>   'ﺷ',
                'middle'		=>   'ﺸ',
                'end'			=>   'ﺶ',
                'isolated'		=>   'ﺵ'
            ),
            'ص' => array(
                'beginning'		=>   'ﺻ',
                'middle'		=>   'ﺼ',
                'end'			=>   'ﺺ',
                'isolated'		=>   'ﺹ'
            ),
            'ض' => array(
                'beginning'		=>   'ﺿ',
                'middle'		=>   'ﻀ',
                'end'			=>   'ﺾ',
                'isolated'		=>   'ﺽ'
            ),
            'ط' => array(
                'beginning'		=>   'ﻃ',
                'middle'		=>   'ﻄ',
                'end'			=>   'ﻂ',
                'isolated'		=>   'ﻁ'
            ),
            'ظ' => array(
                'beginning'		=>   'ﻇ',
                'middle'		=>   'ﻈ',
                'end'			=>   'ﻆ',
                'isolated'		=>   'ﻅ'
            ),
            'ع' => array(
                'beginning'		=>   'ﻋ',
                'middle'		=>   'ﻌ',
                'end'			=>   'ﻊ',
                'isolated'		=>   'ﻉ'
            ),
            'غ' => array(
                'beginning'		=>   'ﻏ',
                'middle'		=>   'ﻐ',
                'end'			=>   'ﻎ',
                'isolated'		=>   'ﻍ'
            ),
            'ف' => array(
                'beginning'		=>   'ﻓ',
                'middle'		=>   'ﻔ',
                'end'			=>   'ﻒ',
                'isolated'		=>   'ﻑ'
            ),
            'ق' => array(
                'beginning'		=>   'ﻗ',
                'middle'		=>   'ﻘ',
                'end'			=>   'ﻖ',
                'isolated'		=>   'ﻕ'
            ),
            'ك' => array(
                'beginning'		=>   'ﻛ',
                'middle'		=>   'ﻜ',
                'end'			=>   'ﻚ',
                'isolated'		=>   'ﻙ'
            ),
            'ل' => array(
                'beginning'		=>   'ﻟ',
                'middle'		=>   'ﻠ',
                'end'			=>   'ﻞ',
                'isolated'		=>   'ﻝ'
            ),
            'م' => array(
                'beginning'		=>   'ﻣ',
                'middle'		=>   'ﻤ',
                'end'			=>   'ﻢ',
                'isolated'		=>   'ﻡ'
            ),
            'ن' => array(
                'beginning'		=>   'ﻧ',
                'middle'		=>   'ﻨ',
                'end'			=>   'ﻦ',
                'isolated'		=>   'ﻥ'
            ),
            'ه' => array(
                'beginning'		=>   'ﻫ',
                'middle'		=>   'ﻬ',
                'end'			=>   'ﻪ',
                'isolated'		=>   'ﻩ'
            ),
            'و' => array(
                'middle'		=>   'ﻮ',
                'isolated'		=>   'ﻭ'
            ),
            'ي' => array(
                'beginning'		=>   'ﻳ',
                'middle'		=>   'ﻴ',
                'end'			=>   'ﻲ',
                'isolated'		=>   'ﻱ'
            ),
            'ئ' => array(
                'beginning'		=>   'ﺋ',
                'middle'		=>   'ﺌ',
                'end'			=>   'ﺊ',
                'isolated'		=>   'ﺉ'
            ),
            'ة' => array(
                'middle'		=>   'ﺔ',
                'isolated'		=>   'ﺓ'
            )
        );

        if(in_array($word[0].$word[1], $isolated_chars))
        {
            $new_word[] = $all_chars[$word[0].$word[1]]['isolated'];
            $char_type[] = 'not_normal';
        }
        else
        {
            $new_word[] = $all_chars[$word[0].$word[1]]['beginning'];
            $char_type[] = 'normal';
        }

        if(strlen($word) > 4)
        {
            if($char_type[0] == 'not_normal')

            {
                if(in_array($word[2].$word[3], $isolated_chars))
                {
                    $new_word[] = $all_chars[$word[2].$word[3]]['isolated'];
                    $char_type[] = 'not_normal';
                }
                else
                {

                    $new_word[] = $all_chars[$word[2].$word[3]]['beginning'];
                    $char_type[] = 'normal';
                }
            }
            else
            {
                $new_word[] = $all_chars[$word[2].$word[3]]['middle'];
                $chars_statue[] = 'middle';

                if(in_array($word[2].$word[3], $isolated_chars))
                {
                    $char_type[] = 'not_normal';
                }
                else
                {
                    $char_type[] = 'normal';
                }
            }
            $x = 4;
        }
        else
        {
            $x = 2;
        }

        for($x=4;$x< (strlen($word)-4) ;$x++)
        {
            if($char_type[count($char_type)-1] == 'not_normal' AND $x %2 == 0)
            {
                if(in_array($word[$x].$word[$x+1], $isolated_chars))
                {

                    $new_word[] = $all_chars[$word[$x].$word[$x+1]]['isolated'];
                    $char_type[] = 'not_normal';
                }
                else
                {

                    $new_word[] = $all_chars[$word[$x].$word[$x+1]]['beginning'];
                    $char_type[] = 'normal';
                }
            }
            elseif($char_type[count($char_type)-1] == 'normal' AND $x %2 == 0)
            {

                if(in_array($word[$x].$word[$x+1], $isolated_chars))
                {

                    $new_word[] = $all_chars[$word[$x].$word[$x+1]]['middle'];
                    $char_type[] = 'not_normal';
                }
                else
                {

                    $new_word[] = $all_chars[$word[$x].$word[$x+1]]['middle'];
                    $char_type[] = 'normal';
                }
            }

        }
        if(strlen($word)>6)
        {
            if($char_type[count($char_type)-1] == 'not_normal')
            {
                if(in_array($word[$x].$word[$x+1], $isolated_chars))
                {

                    $new_word[] = $all_chars[$word[$x].$word[$x+1]]['isolated'];
                    $char_type[] = 'not_normal';
                }
                else
                {

                    if($word[strlen($word)-2].$word[strlen($word)-1] == 'ء')
                    {
                        $new_word[] = $all_chars[$word[$x].$word[$x+1]]['isolated'];
                        $char_type[] = 'normal';
                    }
                    else
                    {
                        $new_word[] = $all_chars[$word[$x].$word[$x+1]]['beginning'];
                        $char_type[] = 'normal';
                    }

                }

                $x += 2;
            }
            elseif($char_type[count($char_type)-1] == 'normal')
            {

                if(in_array($word[$x].$word[$x+1], $isolated_chars))
                {

                    $new_word[] = $all_chars[$word[$x].$word[$x+1]]['middle'];
                    $char_type[] = 'not_normal';
                }
                else
                {

                    $new_word[] = $all_chars[$word[$x].$word[$x+1]]['middle'];
                    $char_type[] = 'normal';
                }

                $x += 2;
            }


        }

        if($char_type[count($char_type)-1] == 'not_normal')
        {

            if(in_array($word[$x].$word[$x+1], $isolated_chars))
            {

                $new_word[] = $all_chars[$word[$x].$word[$x+1]]['isolated'];

            }
            else
            {
                $new_word[] = $all_chars[$word[$x].$word[$x+1]]['isolated'];

            }

        }
        else
        {
            if(in_array($word[$x].$word[$x+1], $isolated_chars))
            {

                $new_word[] = $all_chars[$word[$x].$word[$x+1]]['middle'];

            }
            else
            {

                $new_word[] = $all_chars[$word[$x].$word[$x+1]]['end'];

            }
        }

        return implode('',array_reverse($new_word));
    }
}
?>
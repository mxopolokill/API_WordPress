<?php

Class   api
        {
           $curl=  curl_init("http://localhost/wordpress/wp-json/wp/v2/apprenant");
           $exec= curl_exec($curl);

                if ($exec === False) {
                    
                }
           $fp = fopen("example_homepage.txt", "w");
            
            curl_setopt($ch, CURLOPT_FILE, $fp);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            
            curl_exec($ch);
            if(curl_error($ch)) {
                fwrite($fp, curl_error($ch));
            }
            curl_close($ch);
            fclose($fp);

        }



        

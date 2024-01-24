<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputText = $_POST["inputText"];
    if (!empty($inputText)) {











        function Data($inputText)
        {
            $ALINK = 'https://www.amazon.eg/';
            $AmazonEN = "&language=en_AE&";
            $url = $ALINK . 's?k=' . urlencode($inputText) . $AmazonEN . '&ref=nb_sb_noss';
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
            $dom = new DOMDocument;
            @$dom->loadHTML($response);
            $xpath = new DOMXPath($dom);
            $image = $xpath->query('(//img[@class="s-image"])[1]')->item(0);
            $ratings = $xpath->query('(//div[@class="a-row a-size-small"])[1]')->item(0);
            $price = $xpath->query('(//span[@class="a-price-whole"])[1]')->item(0);
            $priceSymbol = $xpath->query('(//span[@class="a-price-symbol"])[1]')->item(0);
            $linkNode = $xpath->query('(//a[@class="a-link-normal s-underline-text s-underline-link-text s-link-style a-text-normal"])[1]')->item(0);
            $link = $linkNode ? $xpath->evaluate('string(@href)', $linkNode) : '';

            return compact('image', 'ratings', 'price', 'priceSymbol', 'linkNode', 'link', 'ALINK');
        }






        #function Data2($inputText)
        #{



            #$JULINK = 'https://www.jumia.com.eg/';
            #$LINK = $JULINK . 'catalog/?q=' . urlencode($inputText);
            #$ch = curl_init($LINK);
            #curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            #$response = curl_exec($ch);
            #curl_close($ch);
            #$dom = new DOMDocument;
            #@$dom->loadHTML($response);
            #$xpath = new DOMXPath($dom);
            #/** @var DOMElement $element */
            #$element = $xpath->query("//*[@class='img']")->item(0);
            #$image = $element->getAttribute('data-src');
            #$title = $xpath->query('(//h3[@class="name"])[1]')->item(0);
            #$linkNode = $xpath->query('(//a[@class="core"])[1]')->item(0);
            #$link = $linkNode ? $xpath->evaluate('string(@href)', $linkNode) : '';
           # $price = $xpath->query('(//div[@class="prc"])[1]')->item(0);
          #  $ratings = $xpath->query('(//div[@class="stars _s"])[1]')->item(0);

         #   return compact('image', 'title', 'linkNode', 'link', 'price', 'ratings', 'JULINK', 'element');


            
        #}













        function Data3($inputText)
        {
            $ALINK = 'https://www.ebay.com/sch/i.html?_from=R40&_trksid=p4432023.m570.l1313&_nkw=';
            
            $url = $ALINK . urlencode($inputText) . "&_sacat=0";
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
            $dom = new DOMDocument;
            @$dom->loadHTML($response);
            $xpath = new DOMXPath($dom);
            /** @var DOMElement $element */
            $element = $xpath->query('//div[@class="s-item__image-wrapper image-treatment"]/img/@src')->item(1);
            /* $image = $element->getAttribute('src'); */
          
            $ratings = $xpath->query('//*[@id="item36bcdccc50"]/div/div[2]/div[3]/a/div')->item(0);
            $price = $xpath->query('//*[@id="item3e0bfe1591"]/div/div[2]/div[3]/div[1]/span')->item(0);
            $linkNode = $xpath->query('//*[@id="item54de0907eb"]/div/div[2]/a')->item(0);
            $link = $linkNode ? $xpath->evaluate('string(@href)', $linkNode) : '';

            return compact('element', 'ratings', 'price', 'linkNode', 'link', 'ALINK');
        }










    }
}

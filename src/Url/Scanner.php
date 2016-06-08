<?php
    namespace LukasDev\ModernPHP\Url;

    class Scanner
    {
        /**
        * @var um array de urls
        */
        protected $urls;

        /**
        * @var \GuzzleHttp\Client
        */
        protected $httpClient;

        /**
        *@param array $urls um array de urls a ser escaneadas
        */
        public function __construct(array $urls)
        {
            $this->httpClient = new \GuzzleHttp\Client();
            $this->urls = $urls;
        }


        /**
        * pega urls invalidas
        * @return array
        */

        public function getInvalidUrls()
        {
            $invalidUrls = [];
            foreach ($this->urls as $url) {
                try {
                    $statusCode = $this->getStatusCodeForUrl($url);
                } catch(\Exception $e) {
                    $statusCode = 500;
                }

                if ($statusCode >= 400) {
                    array_push($invalidUrls, [
                        'url' => $url,
                        'status' => $statusCode
                    ]);
                }
            }

            return $invalidUrls;
        }

        /**
        * pega código de status HTTP para URL
        * @param string $url a URL remota
        * @return int o código de status
        */
        protected function getStatusCodeForUrl($url)
        {
            $httpResponse = $this->httpClient->options($url);

            return $httpResponse->getStatusCode();
        }
    }
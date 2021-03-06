<?php
namespace {
    include_once 'EWSMain.php';
}

namespace EFLGlobal\EWSClient
{
    class ScoresAPIController extends EWSMain
    {
        public function callDateQuery ($date)
        {
            $url = $this->url . '/dateQuery.json';
            $post = [
                "authToken"=>  $this->authToken64,
                "reqToken"=>   $this->reqToken64,
                "dateQuery"=>$date
            ];
            try {
                $response = static::sendRequest($url, $post);
                return $response;
            } catch (\Exception $e) {
                return static::getError($e);
            }
        }

        public function callSubject ($subject)
        {
            $url = $this->url . '/subject.json';
            $post = [
                "authToken"=>  $this->authToken64,
                "reqToken"=>   $this->reqToken64,
                "subjects"=>$subject
            ];
            try {
                $response = static::sendRequest($url, $post);
                return $response;
            } catch (\Exception $e) {
                return static::getError($e);
            }
        }


        protected function extractTokensFromLoginResponse($login)
        {
            return [$login->authToken, $login->reqToken];
        }
    }
}




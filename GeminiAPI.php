<?php

class GeminiAPI {

    private $api_key;
    public $decodedResponse;

    public function __construct($api_key) {
        $this->api_key = $api_key;
    }

    public function generateContent($text) {
        $url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key=' . $this->api_key;

        $data = array(
            'contents' => array(
                array(
                    'parts' => array(
                        array(
                            'text' => $text
                        )
                    )
                )
            )
        );

        $json_data = json_encode($data);

        $headers = array(
            'Content-Type: application/json'
        );

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_STDERR, fopen('php://stderr', 'w'));

        $response = curl_exec($ch);

        curl_close($ch);

        $this->decodedResponse = json_decode($response, true);

        if ($this->decodedResponse === null) {
            throw new Exception('Unable to decode JSON response');
        }

        return $this->getMostImportantResult();
    }

    private function getMostImportantResult() {
        if (isset($this->decodedResponse['candidates'][0]['content']['parts'])) {
            $textParts = $this->decodedResponse['candidates'][0]['content']['parts'];

            $resultText = '';

            foreach ($textParts as $part) {
                if (isset($part['text'])) {
                    $resultText .= $part['text'];
                }
            }

            return $resultText;
        } else {
            return null;
        }
    }
}

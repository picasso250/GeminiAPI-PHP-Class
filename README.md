# GeminiAPI PHP Class

The GeminiAPI PHP class provides a convenient way to interact with the Gemini language model API. It allows you to generate content based on either text or image input and retrieve the most important result from the API response.

## Usage

1. Replace 'YOUR_API_KEY' with your actual Gemini API key in the code.

2. Create an instance of the `GeminiAPI` class:

    ```php
    $api_key = 'YOUR_API_KEY';
    $geminiAPI = new GeminiAPI($api_key);
    ```

3. Use the `generateContent` method to send a request to the Gemini API:

    - For text input:

    ```php
    $text = 'What is this picture?';
    $result = $geminiAPI->generateContent($text);
    ```

    - For image input:

    ```php
    // Ensure that the image does not exceed the maximum width/height of 512px
    $imageData = file_get_contents('image.jpg');
    $result = $geminiAPI->generateContent(null, $imageData);
    ```

4. The result will contain the concatenated 'text' parts from the API response:

    ```php
    echo $result;
    ```

## Important Notes

- Ensure that cURL is enabled in your PHP configuration.

- Image data is base64-encoded before being included in the JSON request.

- The maximum width/height for images is 512 pixels.

## License

This code is provided under the MIT License. See the [LICENSE](LICENSE) file for details.

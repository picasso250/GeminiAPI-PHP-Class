# GeminiAPI PHP Class

The GeminiAPI PHP class provides a convenient way to interact with the Gemini language model API. It allows you to generate content based on input text and retrieve the most important result from the API response. Additionally, it supports a `vision` method for processing image requests.

## Usage

1. Replace 'YOUR_API_KEY' with your actual Gemini API key in the code.

2. Create an instance of the `GeminiAPI` class:

    ```php
    $api_key = 'YOUR_API_KEY';
    $geminiAPI = new GeminiAPI($api_key);
    ```

3. Use the `generateContent` method to send a request to the Gemini API with the text input "Write a story about a magic backpack.":

    ```php
    $text = 'Write a story about a magic backpack.';
    $result = $geminiAPI->generateContent($text);
    echo "Generate Content Result: $result\n";
    ```

4. Use the `vision` method to send a request to the Gemini API with the text input "What is this picture?" and the image input following the example code:

    ```php
    $textForVision = 'What is this picture?';
    $imageContents = file_get_contents('path/to/your/image.jpg');
    $result = $geminiAPI->vision($textForVision, $imageContents);
    echo "Vision Result: $result\n";
    ```

## Important Note

- Ensure that cURL is enabled in your PHP configuration.
- The maximum width/height for images is 512 pixels.

## License

This code is provided under the MIT License. See the [LICENSE](LICENSE) file for details.

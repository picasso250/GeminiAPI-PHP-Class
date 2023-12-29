# GeminiAPI PHP Class

The GeminiAPI PHP class provides a convenient way to interact with the Gemini language model API. It allows you to generate content based on input text and retrieve the most important result from the API response. Additionally, it supports a `vision` method for processing image requests and a `chat` method for engaging in conversational interactions. Two new methods, `embedContent` and `batchEmbedContents`, have been added for content embedding.

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

5. Use the `chat` method to engage in a conversation. The `history` property stores the conversation history, and `decodedResponse` contains the raw API response. Start the conversation with a user message, and you can continue by passing the updated history to the `chat` method:

    ```php
    // Initial user message to start the conversation
    $conversation = array(
        array(
            'role' => 'user',
            'parts' => array(
                array(
                    'text' => 'Write the first line of a story about a magic backpack.'
                )
            )
        ),
    );

    // Send the user message to the Gemini API
    $result = $geminiAPI->chat($conversation);
    echo "Chat Result: $result\n";
    echo "Initial Conversation History: " . json_encode($geminiAPI->history) . "\n";
    echo "Decoded API Response: " . json_encode($geminiAPI->decodedResponse) . "\n";

    // Continue the conversation by adding model and user messages to the history
    $conversation = array_merge($geminiAPI->history,
        array(
            'role' => 'user',
            'parts' => array(
                array(
                    'text' => 'Can you set it in a quiet village in 1600s France?'
                )
            )
        )
    );

    // Continue the conversation by passing the updated history
    $result = $geminiAPI->chat($conversation);
    echo "Chat Result: $result\n";
    echo "Updated Conversation History: " . json_encode($geminiAPI->history) . "\n";
    echo "Decoded API Response: " . json_encode($geminiAPI->decodedResponse) . "\n";
    ```

6. Use the new `embedContent` and `batchEmbedContents` methods for content embedding:

    ```php
    // Embed a single content
    $textForEmbedding = "Write a story about a magic backpack.";
    $result = $geminiAPI->embedContent($textForEmbedding);
    echo "Embed Content Result: $result\n";

    // Batch embed multiple contents
    $textsForBatch = [
        "Write a story about a magic backpack.",
        "Describe a beautiful sunset over the mountains."
    ];
    $results = $geminiAPI->batchEmbedContents($textsForBatch);
    echo "Batch Embed Contents Result: $results\n";
    ```

## Important Note

- Ensure that cURL is enabled in your PHP configuration.
- The maximum width/height for images is 512 pixels.

## License

This code is provided under the MIT License. See the [LICENSE](LICENSE) file for details.

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenAI Chat App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .chat-box {
            border: 1px solid #ccc;
            padding: 15px;
            margin-top: 20px;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        .message {
            margin-bottom: 15px;
        }

        .user-message {
            background-color: #cce5ff;
            padding: 8px;
            border-radius: 8px;
        }

        .assistant-message {
            background-color: #f0f0f0;
            padding: 8px;
            border-radius: 8px;
        }

        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">OpenAI Chat App</h1>

        <div class="chat-box">
            <div class="message user-message">
                <strong>User:</strong> Hello!
            </div>

            <div class="message assistant-message">
                <strong>Assistant:</strong> Welcome! How can I assist you today?
            </div>

            <!-- Add more messages dynamically based on your data -->

        </div>

        <form method="post" action="{{ route('generateResponse') }}" class="mb-4">
            @csrf
            <div class="form-group">
                <label for="prompt">Enter Prompt:</label>
                <input type="text" name="prompt" id="prompt" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Generate Response</button>
        </form>

        @if(isset($prompt))
            <h2>Input Prompt:</h2>
            <p>{{ $prompt }}</p>

            <h2>Generated Response:</h2>
            <p>{{ $response }}</p>
        @endif

        @if($errors->any())
            <div class="alert alert-danger mt-4">
                <h2>Errors:</h2>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

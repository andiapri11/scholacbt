<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Kesalahan Database</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4361ee;
            --danger: #ef4444;
            --background: #f0f2f5;
            --text-main: #1e293b;
            --text-muted: #64748b;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #f0f2f5 0%, #e2e8f0 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            color: var(--text-main);
            padding: 20px;
        }

        .error-container {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            padding: 3.5rem 2.5rem;
            border-radius: 2.5rem;
            box-shadow: 
                0 20px 25px -5px rgba(0, 0, 0, 0.05),
                0 10px 10px -5px rgba(0, 0, 0, 0.02);
            width: 100%;
            max-width: 600px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.8);
            animation: slideUp 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        @keyframes slideUp {
            from { transform: translateY(40px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .icon-wrapper {
            width: 100px;
            height: 100px;
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger);
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2.5rem;
        }

        .icon-wrapper svg {
            width: 48px;
            height: 48px;
        }

        h1 {
            font-weight: 800;
            font-size: 2rem;
            margin-bottom: 1.25rem;
            letter-spacing: -0.04em;
            color: #0f172a;
        }

        .message-box {
            color: var(--text-muted);
            line-height: 1.8;
            margin-bottom: 2rem;
            font-size: 1.1rem;
            text-align: left;
        }

        code {
            font-family: 'Fira Code', monospace;
            display: block;
            background: #1e293b;
            color: #e2e8f0;
            padding: 1.25rem;
            border-radius: 1rem;
            font-size: 0.85rem;
            overflow-x: auto;
            margin-top: 1.5rem;
            box-shadow: inset 0 2px 10px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="icon-wrapper">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
            </svg>
        </div>
        <h1><?php echo $heading; ?></h1>
        <div class="message-box">
            <?php echo $message; ?>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $heading; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4361ee;
            --danger: #ff4d4f;
            --warning: #faad14;
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
            max-width: 550px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.8);
            animation: slideUp 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
            position: relative;
            overflow: hidden;
        }

        @keyframes slideUp {
            from { transform: translateY(40px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .error-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(to right, var(--danger), var(--warning));
        }

        .icon-wrapper {
            width: 100px;
            height: 100px;
            background: rgba(255, 77, 79, 0.1);
            color: var(--danger);
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2.5rem;
            position: relative;
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
        }

        .message-box p {
            margin-bottom: 15px;
        }

        .message-box a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: var(--primary);
            color: white;
            text-decoration: none;
            padding: 0.85rem 1.75rem;
            border-radius: 1rem;
            font-weight: 700;
            transition: all 0.3s ease;
            box-shadow: 0 10px 15px -3px rgba(67, 97, 238, 0.3);
            margin-top: 10px;
            font-size: 0.95rem;
        }

        .message-box a:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 25px -5px rgba(67, 97, 238, 0.4);
            background: #3651d1;
        }

        code {
            font-family: 'Fira Code', monospace;
            display: block;
            background: #f1f5f9;
            padding: 1rem;
            border-radius: 0.75rem;
            font-size: 0.85rem;
            text-align: left;
            margin-top: 1rem;
            border: 1px solid #e2e8f0;
            color: #475569;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="icon-wrapper">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
        </div>
        <h1><?php echo $heading; ?></h1>
        <div class="message-box">
            <?php echo $message; ?>
        </div>
    </div>
</body>
</html>

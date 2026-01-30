<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Halaman Tidak Ditemukan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4361ee;
            --info: #0ea5e9;
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
            padding: 4rem 2.5rem;
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
            background: linear-gradient(to right, var(--primary), var(--info));
        }

        .error-code {
            font-size: 8rem;
            font-weight: 800;
            line-height: 1;
            margin-bottom: 1rem;
            background: linear-gradient(to bottom, #1e293b, #64748b);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            opacity: 0.1;
            position: absolute;
            top: 2rem;
            left: 50%;
            transform: translateX(-50%);
            z-index: 0;
        }

        .content-wrap {
            position: relative;
            z-index: 1;
        }

        .icon-wrapper {
            width: 100px;
            height: 100px;
            background: rgba(67, 97, 238, 0.1);
            color: var(--primary);
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
        }

        .icon-wrapper svg {
            width: 48px;
            height: 48px;
        }

        h1 {
            font-weight: 800;
            font-size: 2.25rem;
            margin-bottom: 1rem;
            letter-spacing: -0.04em;
            color: #0f172a;
        }

        .message-box {
            color: var(--text-muted);
            line-height: 1.8;
            margin-bottom: 2.5rem;
            font-size: 1.1rem;
        }

        .btn-modern {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: var(--primary);
            color: white !important;
            text-decoration: none;
            padding: 1rem 2.25rem;
            border-radius: 1.25rem;
            font-weight: 700;
            transition: all 0.3s ease;
            box-shadow: 0 10px 15px -3px rgba(67, 97, 238, 0.3);
            font-size: 1rem;
        }

        .btn-modern:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 25px -5px rgba(67, 97, 238, 0.4);
            background: #3651d1;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-code">404</div>
        <div class="content-wrap">
            <div class="icon-wrapper">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <h1><?php echo $heading; ?></h1>
            <div class="message-box">
                <?php echo $message; ?>
            </div>
            <a href="/" class="btn-modern">Beranda</a>
        </div>
    </div>
</body>
</html>

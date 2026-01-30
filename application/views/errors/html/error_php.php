<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div style="background: #fff; border-left: 5px solid #ef4444; padding: 1.5rem; margin: 1.5rem 0; border-radius: 1rem; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); font-family: 'Plus Jakarta Sans', sans-serif;">
    <h4 style="margin: 0 0 1rem 0; color: #1e293b; font-weight: 800; display: flex; align-items: center; gap: 10px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
        Peringatan Sistem (PHP Error)
    </h4>

    <div style="display: grid; grid-template-columns: auto 1fr; gap: 8px 16px; font-size: 0.9rem; color: #64748b;">
        <span style="font-weight: 700; color: #475569;">Severity:</span> <span><?php echo $severity; ?></span>
        <span style="font-weight: 700; color: #475569;">Message:</span> <span style="color: #ef4444; font-weight: 600;"><?php echo $message; ?></span>
        <span style="font-weight: 700; color: #475569;">Filename:</span> <code style="background: #f1f5f9; padding: 2px 6px; border-radius: 4px; font-family: 'Fira Code', monospace; font-size: 0.8rem;"><?php echo $filepath; ?></code>
        <span style="font-weight: 700; color: #475569;">Line:</span> <span style="font-weight: 700; color: #1e293b;"><?php echo $line; ?></span>
    </div>

    <?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>
        <div style="margin-top: 1.25rem; border-top: 1px solid #f1f5f9; padding-top: 1rem;">
            <p style="font-weight: 700; font-size: 0.85rem; color: #475569; margin-bottom: 0.75rem; text-transform: uppercase; letter-spacing: 0.5px;">Backtrace Debugging:</p>
            <?php foreach (debug_backtrace() as $error): ?>
                <?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>
                    <div style="background: #f8fafc; margin-bottom: 8px; padding: 10px 14px; border-radius: 8px; border: 1px solid #f1f5f9; font-size: 0.8rem;">
                        <span style="color: #64748b;">File:</span> <code style="color: #1e293b; font-family: 'Fira Code', monospace;"><?php echo $error['file'] ?></code><br/>
                        <span style="color: #64748b;">Line:</span> <span style="font-weight: 700;"><?php echo $error['line'] ?></span> | 
                        <span style="color: #64748b;">Function:</span> <span style="color: #4361ee; font-weight: 600;"><?php echo $error['function'] ?></span>
                    </div>
                <?php endif ?>
            <?php endforeach ?>
        </div>
    <?php endif ?>
</div>

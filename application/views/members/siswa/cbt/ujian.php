<style>
    .exam-header {
        background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
        padding: 1.5rem 0 4rem 0;
        margin-bottom: -3rem;
    }
    .card-exam {
        border-radius: 20px;
        border: 1px solid rgba(0,0,0,0.1);
        box-shadow: none !important;
        overflow: hidden;
    }
    .card-exam .card-header {
        background: inherit;
        border-bottom: 1px solid rgba(0,0,0,0.05);
        padding: 1.25rem 2rem;
    }
    .nomor-badge {
        background: #f1f5f9;
        color: #4361ee;
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        font-weight: 800;
        font-size: 1.25rem;
        box-shadow: inset 0 2px 4px rgba(0,0,0,0.05);
    }
    .label-soal {
        font-size: 0.7rem;
        line-height: 1.1;
        font-weight: 900;
        color: #64748b;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        display: flex;
        flex-direction: column;
    }
    .timer-pill {
        background: #fef2f2;
        color: #ef4444;
        padding: 8px 16px;
        border-radius: 12px;
        border: 1px solid #fee2e2;
        font-weight: 800;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .timer-pill i {
        font-size: 1.2rem;
    }
    .timer-label {
        font-size: 0.6rem;
        font-weight: 800;
        letter-spacing: 0.05em;
        opacity: 0.8;
        display: block;
        margin-bottom: -2px;
    }
    .question-content {
        font-size: 1.15rem;
        line-height: 1.7;
        color: #334155;
        font-weight: 500;
    }
    .nav-btn {
        padding: 12px 24px;
        border-radius: 12px;
        font-weight: 700;
        transition: all 0.3s;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        font-size: 0.85rem;
    }
    .nav-btn-prev {
        background: #f1f5f9;
        color: #64748b;
        border: none;
    }
    .nav-btn-prev:hover:not(:disabled) {
        background: #e2e8f0;
        color: #1e293b;
    }
    .nav-btn-next {
        background: #4361ee;
        color: #fff;
        border: none;
        box-shadow: 0 4px 12px rgba(67, 97, 238, 0.2);
    }
    .nav-btn-next:hover:not(:disabled) {
        background: #3751d7;
        transform: translateY(-2px);
        box-shadow: 0 8px 15px rgba(67, 97, 238, 0.3);
    }
    .nav-btn-finish {
        background: #10b981;
        color: #fff;
        border: none;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
    }
    .nav-btn-finish:hover:not(:disabled) {
        background: #059669;
        transform: translateY(-2px);
        box-shadow: 0 8px 15px rgba(16, 185, 129, 0.3);
    }
    
    /* Answer styling */
    .container-jawaban {
        display: block;
        position: relative;
        padding-left: 60px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 1.1rem;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        min-height: 48px;
        display: flex;
        align-items: center;
        background: #f8fafc;
        border-radius: 12px;
        border: 2px solid transparent;
        transition: all 0.2s;
    }
    .container-jawaban:hover {
        background: #f1f5f9;
    }
    .container-jawaban input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }
    .checkmark {
        position: absolute;
        top: 50%;
        left: 12px;
        transform: translateY(-50%);
        height: 32px;
        width: 32px;
        background-color: #fff;
        border-radius: 8px;
        border: 2px solid #e2e8f0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        color: #64748b;
        transition: all 0.2s;
    }
    .container-jawaban input:checked ~ .checkmark {
        background-color: #4361ee;
        border-color: #4361ee;
        color: #fff;
        box-shadow: 0 4px 10px rgba(67, 97, 238, 0.3);
    }
    .container-jawaban input[type="checkbox"] ~ .checkmark {
        border-radius: 50% !important;
    }
    .container-jawaban input[type="checkbox"] ~ .checkmark i {
        display: none;
        font-size: 14px;
    }
    .container-jawaban input[type="checkbox"]:checked ~ .checkmark i {
        display: block;
    }
    .container-jawaban input:checked ~ .container-jawaban {
        background: #eef2ff;
        border-color: #4361ee;
    }

    /* Modal Question List Styling */
    #konten-modal .grid-nomor-pg {
        display: grid !important;
        grid-template-columns: repeat(auto-fill, minmax(60px, 1fr));
        gap: 15px;
        padding: 10px;
    }
    #konten-modal .mb-4 {
        margin-bottom: 0 !important;
    }
    #konten-modal [id^="box"] {
        width: 100% !important;
        height: auto !important;
        position: relative !important;
    }
    #konten-modal .btn {
        width: 100% !important;
        height: 60px !important;
        border-radius: 12px !important;
        font-weight: 800 !important;
        border: 2px solid #e2e8f0 !important;
        background: #fff !important;
        color: #475569 !important;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
        box-shadow: 0 2px 4px rgba(0,0,0,0.02);
    }
    #konten-modal .btn:hover {
        border-color: #cbd5e1 !important;
        background: #f8fafc !important;
        transform: translateY(-2px);
    }
    #konten-modal .btn.active {
        border-color: #4361ee !important;
        background: #eef2ff !important;
        color: #4361ee !important;
        box-shadow: 0 4px 10px rgba(67, 97, 238, 0.15) !important;
    }
    #konten-modal .btn-primary {
        background: #4361ee !important;
        color: #fff !important;
        border-color: #4361ee !important;
    }
    #konten-modal [id^="badge"] {
        position: absolute !important;
        top: -8px !important;
        right: -8px !important;
        margin: 0 !important;
        width: 26px !important;
        height: 26px !important;
        font-size: 11px !important;
        font-weight: 800 !important;
        display: flex !important;
        align-items: center;
        justify-content: center;
        background: #10b981 !important;
        color: #fff !important;
        border: 3px solid #fff !important;
        box-shadow: 0 4px 6px rgba(16, 185, 129, 0.2) !important;
        border-radius: 50% !important;
        z-index: 5;
        line-height: 1;
    }

    #jawaban-isian, #jawaban-essai {
        border-radius: 12px;
        border: 2px solid #e2e8f0;
        padding: 15px;
        transition: all 0.2s;
    }
    #jawaban-isian:focus {
        border-color: #4361ee;
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
    }

    /* POPUP ZOOM STYLES - UNIVERSAL ELEGANT VERSION */
    .dropdown-menu.rounded-2xl {
        border-radius: 20px !important;
    }
    .zoominout {
        display: flex !important;
        flex-direction: row !important;
        flex-wrap: nowrap !important;
        align-items: center !important;
        justify-content: space-between !important;
        width: 100% !important;
        background: #f1f5f9;
        padding: 8px 12px;
        border-radius: 12px;
    }
    .zoominout span:first-child {
        display: none !important;
    }
    .zoominout .btn {
        flex: 0 0 32px !important;
        height: 32px !important;
        padding: 0 !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        border-radius: 50% !important;
        background: #fff !important;
        border: none !important;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1) !important;
        color: #4361ee !important;
        transition: all 0.2s;
    }
    .zoominout .btn:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 12px rgba(67, 97, 238, 0.15) !important;
    }
    .zoominout .ranger {
        flex: 1 !important;
        margin: 0 10px !important;
        height: 3px;
        -webkit-appearance: none;
        background: #cbd5e1;
        border-radius: 2px;
        outline: none;
    }
    .zoominout .ranger::-webkit-slider-thumb {
        -webkit-appearance: none;
        width: 14px;
        height: 14px;
        background: #4361ee;
        border-radius: 50%;
        cursor: pointer;
    }
    .zoom-value {
        font-size: 0.85rem;
        font-weight: 800;
        color: #4361ee;
        min-width: 45px;
        text-align: right;
    }

    @media (max-width: 768px) {
        .card-exam .card-header {
            padding: 0.6rem 1rem;
        }
        .nomor-badge {
            width: 38px;
            height: 38px;
            font-size: 1rem;
            margin: 0 !important;
        }
        .timer-pill {
            padding: 6px 10px;
            font-size: 0.85rem;
            gap: 6px;
        }
        .timer-label {
            display: none !important; /* Hide 'SISA WAKTU' text */
        }
        .header-actions {
            gap: 6px !important;
        }
        .btn-header-mobile {
            padding: 0.4rem 0.6rem !important;
            min-width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .btn-header-mobile i {
            font-size: 1rem;
            margin: 0 !important;
        }
        .section-header-bar {
            flex-direction: column !important;
            align-items: flex-start !important;
            padding: 10px 15px !important;
        }
        .section-header-bar > span {
            margin-bottom: 8px;
            font-size: 0.75rem;
            width: 100%;
            display: block;
        }
        .section-header-bar .d-flex.align-items-center {
            width: 100%;
            display: flex !important;
            flex-direction: column !important;
            align-items: flex-start !important;
            gap: 8px;
        }
        .card-body .d-flex.justify-content-between.align-items-center {
            flex-direction: column !important;
            align-items: flex-start !important;
        }
        .card-footer > .d-flex {
            gap: 12px !important;
        }
        .nav-btn, #timer-wrapper {
            flex: 1;
            display: flex;
        }
        .nav-btn {
            padding: 10px 12px !important;
            font-size: 0.75rem !important;
            text-align: center;
            align-items: center;
            justify-content: center;
            width: 100%;
        }
        #next {
            width: 100%;
        }
        .nav-btn i {
            margin: 0 4px !important;
        }
    }
    
    /* Matching Question Fixes */
    .linker-list {
        min-width: 750px !important; /* Increased for better visibility of columns */
        padding-bottom: 20px;
    }
    .linker-list > div {
        flex-shrink: 0 !important;
    }
    .table-responsive {
        -webkit-overflow-scrolling: touch;
        overflow-x: auto !important;
        cursor: grab;
        border-bottom: 2px solid #f1f5f9;
        scrollbar-width: thin;
        scrollbar-color: #4361ee #f1f5f9;
        margin-bottom: 15px;
    }
    .table-responsive::-webkit-scrollbar {
        height: 6px;
    }
    .table-responsive::-webkit-scrollbar-thumb {
        background: #4361ee;
        border-radius: 10px;
    }
    .table-responsive:active {
        cursor: grabbing;
    }
    .item-kiri, .item-kanan {
        touch-action: pan-x pan-y;
        user-select: none;
        -webkit-user-select: none;
        min-width: 200px;
    }
    /* Fixed canvas to not block scrolling but allow interaction */
    canvas#canvas {
        max-width: 100%;
        backface-visibility: hidden;
        -webkit-backface-visibility: hidden;
        transform: translateZ(0);
        -webkit-transform: translateZ(0);
        image-rendering: -webkit-optimize-contrast;
    }
    
    /* Skeleton Loading Modern */
    .overlay-modern {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #fff;
        z-index: 1000;
        display: flex;
        flex-direction: column;
        padding: 2rem 3rem;
        gap: 1.5rem;
    }

    .skeleton-line {
        height: 20px;
        background: #f1f5f9;
        border-radius: 6px;
        animation: pulse-skeleton 1.5s infinite ease-in-out;
    }

    .skeleton-block {
        height: 150px;
        background: #f1f5f9;
        border-radius: 12px;
        animation: pulse-skeleton 1.5s infinite ease-in-out;
    }

    .skeleton-option {
        height: 60px;
        background: #f8fafc;
        border-radius: 12px;
        animation: pulse-skeleton 1.5s infinite ease-in-out;
        animation-delay: 0.1s;
    }

    @keyframes pulse-skeleton {
        0% { opacity: 0.6; }
        50% { opacity: 0.3; }
        100% { opacity: 0.6; }
    }


    /* Soft UI Alerts */
    .alert-soft-primary { background-color: #eef2ff; color: #4361ee; border: none; }
    .alert-soft-success { background-color: #ecfdf5; color: #10b981; border: none; }
    .alert-soft-info { background-color: #eff6ff; color: #3b82f6; border: none; }
    .alert-soft-warning { background-color: #fffbeb; color: #f59e0b; border: none; }
    .alert-soft-danger { background-color: #fef2f2; color: #ef4444; border: none; }

    /* Summernote Modernization */
    .note-editor.note-frame {
        border-radius: 12px !important;
        border: 2px solid #e2e8f0 !important;
        overflow: hidden;
    }
    .note-toolbar {
        background: #f8fafc !important;
        border-bottom: 1px solid #e2e8f0 !important;
        padding: 10px !important;
    }
    .note-btn {
        background: #fff !important;
        border: 1px solid #e2e8f0 !important;
        border-radius: 6px !important;
        box-shadow: none !important;
        color: #475569;
        transition: all 0.2s;
    }
    .note-btn:hover {
        background: #f1f5f9 !important;
        border-color: #cbd5e1 !important;
    }
    .note-btn.active {
        background: #e2e8f0 !important;
        border-color: #94a3b8 !important;
        color: #0f172a !important;
        box-shadow: inset 0 2px 4px rgba(0,0,0,0.05) !important;
    }

    /* LinkerList (Matching) Mobile Fix */
    .linker-container {
        overflow-x: auto;
        padding: 10px;
        background: inherit !important;
        border-radius: 12px;
    }
    .table-responsive {
        background: inherit !important;
    }
    @media (max-width: 768px) {
        .linker-container canvas {
            max-width: 100%;
        }
    }

    .timer-pill.warning {
        animation: pulse-danger 1s infinite alternate;
    }
    @keyframes pulse-danger {
        from { box-shadow: 0 0 0 0 rgba(230, 57, 70, 0.4); }
        to { box-shadow: 0 0 0 10px rgba(230, 57, 70, 0); }
    }

    /* Full Focus Mode */
    .main-header {
        display: none !important;
    }
    .content-wrapper, .content, .container, .row, .col-12 {
        background: inherit !important;
    }
    .card-exam {
        background: inherit !important;
        border: 1px solid rgba(0,0,0,0.05);
    }
    @media (max-width: 768px) {
        .content-wrapper {
            padding-top: 10px !important;
        }
    }
    /* Tidy Question & Answer Sections */
    .question-section, .answer-section {
        background: inherit;
        border: 1px solid rgba(0,0,0,0.1);
        border-radius: 16px;
        position: relative;
        margin-bottom: 2rem;
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .answer-section {
        margin-top: 1.5rem;
    }

    .question-section {
    }

    .section-header-bar {
        padding: 12px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-bottom: 1px solid rgba(0,0,0,0.05);
        font-weight: 700;
        font-size: 0.82rem;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }

    .header-pertanyaan {
        background-color: rgba(99, 102, 241, 0.05);
        color: #4338ca;
    }

    .header-jawaban {
        background-color: rgba(16, 185, 129, 0.05);
        color: #065f46;
    }

    .section-body {
        padding: 25px;
    }

    .zoom-tool-bar {
        font-weight: normal;
        text-transform: none;
        letter-spacing: normal;
    }

    .question-section, .answer-section, .note-editor.note-frame, .note-editor.note-frame:focus, .note-editable:focus {
        box-shadow: none !important;
        outline: none !important;
    }

    /* DARK MODE ANSWER CONTRAST FIX */
    .theme-dark .img-pilih {
        background-color: #2a2a2a !important;
        border: 1px solid #3d3d3d !important;
        color: #e2e8f0 !important;
        box-shadow: 0 4px 6px rgba(0,0,0,0.2) !important;
    }

    .theme-dark .img-pilih .pilihan-opsi {
        background: #333 !important;
        color: #fff !important;
        border: 1px solid #444 !important;
    }

    .theme-dark .img-pilih .text-opsi {
        color: #cbd5e1 !important;
    }

    .theme-dark .img-pilih.pilihan-cek {
        background-color: #1e293b !important;
        border-color: #4361ee !important;
    }
    
    .theme-dark .img-pilih.pilihan-cek .pilihan-opsi {
        background: #4361ee !important;
        color: white !important;
    }

    #running-text-container {
        display: none !important;
    }

    .content-wrapper { 
        padding-bottom: 0 !important; 
        min-height: auto !important;
    }
    
    .content { 
        padding-bottom: 0 !important; 
    }

    /* AI-STYLE TOAST MODERNIZATION */
    .jq-toast-wrap .jq-toast-single {
        background: rgba(255, 255, 255, 0.98) !important;
        backdrop-filter: blur(15px) !important;
        border-radius: 20px !important;
        border: none !important;
        box-shadow: 0 20px 50px rgba(99, 102, 241, 0.15) !important;
        padding: 16px 20px 16px 55px !important; /* Increased left padding for icon */
        color: #1e293b !important;
        overflow: hidden;
        min-width: 280px;
        animation: toastFadeIn 0.4s cubic-bezier(0.16, 1, 0.3, 1) !important;
    }
    @keyframes toastFadeIn {
        from { opacity: 0; transform: translateY(20px) scale(0.95); }
        to { opacity: 1; transform: translateY(0) scale(1); }
    }
    .jq-toast-icon {
        top: 20px !important;
        left: 20px !important;
        width: 24px !important;
        height: 24px !important;
    }
    .theme-dark .jq-toast-wrap .jq-toast-single {
        background: rgba(30, 41, 59, 0.95) !important;
        color: #f1f5f9 !important;
        border: none !important;
    }
    .jq-toast-wrap .jq-toast-single h2 {
        font-family: 'Outfit', sans-serif;
        font-weight: 800 !important;
        font-size: 0.95rem !important;
        color: #6366f1 !important;
        letter-spacing: 0.5px;
        margin-bottom: 5px !important;
        text-transform: uppercase;
        display: flex;
        align-items: center;
    }
    .jq-toast-wrap .jq-toast-single h2 i {
        margin-right: 10px;
        font-size: 1.1rem;
        background: linear-gradient(45deg, #6366f1, #a855f7);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .jq-toast-loader {
        display: none !important;
    }

    @media (max-width: 768px) {
        .jq-toast-wrap {
            width: 90% !important;
            left: 5% !important;
            margin: 0 !important;
        }
        .jq-toast-single {
            padding: 14px 16px 14px 50px !important;
            border-radius: 16px !important;
        }
        .jq-toast-icon {
            top: 18px !important;
            left: 15px !important;
        }
    }

    /* Reading Mode UI Adaptation - SEPIA */
    body.theme-sepia,
    .theme-sepia .content-wrapper,
    .theme-sepia .card-exam, 
    .theme-sepia .card-body,
    .theme-sepia .card-footer,
    .theme-sepia .info-siswa-card,
    .theme-sepia .question-section,
    .theme-sepia .answer-section,
    .theme-sepia .section-body,
    .theme-sepia .konten-soal-jawab,
    .theme-sepia #konten-jawaban { 
        background-color: #f4ecd8 !important; 
        color: #5b4636 !important; 
    }
    .theme-sepia .card-header,
    .theme-sepia .info-siswa-card,
    .theme-sepia .section-header-bar { 
        background-color: #f1e6cc !important; 
        border-color: #e0d1b1 !important; 
    }
    .theme-sepia .header-pertanyaan { background: rgba(139, 107, 77, 0.15) !important; }
    .theme-sepia .header-jawaban { background: rgba(107, 142, 35, 0.15) !important; }

    .theme-sepia .dropdown-menu,
    .theme-sepia .modal-content,
    .theme-sepia .note-editor.note-frame,
    .theme-sepia .note-toolbar,
    .theme-sepia .note-editing-area,
    .theme-sepia .note-status-output,
    .theme-sepia .note-resizebar {
        background-color: rgba(241, 230, 204, 0.98) !important;
        backdrop-filter: blur(10px);
        color: #5b4636 !important;
        border-color: #e0d1b1 !important;
        box-shadow: none !important;
    }
    .theme-sepia .note-editable {
        background-color: #fcf6ea !important;
        color: #5b4636 !important;
    }
    .theme-sepia .note-placeholder {
        color: #a89a78 !important;
    }
    .theme-sepia .text-dark-theme { color: #5b4636 !important; }
    .theme-sepia .nomor-badge { 
        background-color: #e0d1b1 !important; 
        color: #5b4636 !important; 
    }
    .theme-sepia .question-content { color: #5b4636 !important; }
    .theme-sepia .linker-container, .theme-sepia .table-responsive {
        background-color: #fcf6ea !important;
    }
    
    /* Reading Mode UI Adaptation - DARK */
    body.theme-dark,
    .theme-dark .content-wrapper,
    .theme-dark .card-exam, 
    .theme-dark .card-body,
    .theme-dark .card-footer,
    .theme-dark .info-siswa-card,
    .theme-dark .question-section,
    .theme-dark .answer-section,
    .theme-dark .section-body,
    .theme-dark .konten-soal-jawab,
    .theme-dark #konten-jawaban { 
        background-color: #1a1a1a !important; 
        color: #e0e0e0 !important; 
    }
    .theme-dark .card-header,
    .theme-dark .info-siswa-card,
    .theme-dark .section-header-bar { 
        background-color: #262626 !important; 
        border-color: #333 !important; 
    }
    .theme-dark .header-pertanyaan { background: rgba(99, 102, 241, 0.15) !important; }
    .theme-dark .header-jawaban { background: rgba(16, 185, 129, 0.15) !important; }

    .theme-dark .dropdown-menu,
    .theme-dark .modal-content,
    .theme-dark .note-editor.note-frame,
    .theme-dark .note-toolbar,
    .theme-dark .note-editing-area,
    .theme-dark .note-status-output,
    .theme-dark .note-resizebar {
        background-color: rgba(38, 38, 38, 0.98) !important;
        backdrop-filter: blur(10px);
        color: #e0e0e0 !important;
        border-color: #333 !important;
        box-shadow: none !important;
    }
    .theme-dark .note-editable {
        background-color: #222 !important;
        color: #e0e0e0 !important;
    }
    .theme-dark .note-placeholder {
        color: #555 !important;
    }
    .theme-dark .text-dark-theme { color: #e0e0e0 !important; }
    .theme-dark .nomor-badge { 
        background-color: #333 !important; 
        color: #818cf8 !important; 
    }
    .theme-dark .timer-pill { background-color: #311b1b; border-color: #582121; }
    .theme-dark .btn-light { background-color: #333 !important; color: #e0e0e0 !important; }
    .theme-dark .question-content { color: #e0e0e0 !important; }
    .theme-dark .linker-container, .theme-dark .table-responsive {
        background-color: #222 !important;
    }
    .theme-dark .note-placeholder {
        color: #555 !important;
    }

</style>
<div class="content-wrapper">
    <section class="content">
        <div class="container">
            <div class="row mb-3" id="info-siswa-row">
                <div class="col-12">
                     <div class="card border-0 shadow-sm info-siswa-card" style="border-radius: 16px;">
                         <div class="card-body p-3 d-flex align-items-center justify-content-between">
                             <div class="d-flex align-items-center" id="student-info-main">
                                 <div>
                                     <h6 class="font-weight-bold mb-1 text-dark-theme" style="line-height:1.2"><?= $siswa->nama ?></h6>
                                     <div class="d-flex align-items-center text-xs font-weight-bold text-muted">
                                         <span class="mr-2"><i class="fas fa-layer-group mr-1 text-primary"></i> <?= $siswa->nama_kelas ?></span>
                                         <span class="mx-1 opacity-50">•</span>
                                         <span class="ml-2"><i class="fas fa-book-open mr-1 text-info"></i> <?= $jadwal->nama_mapel ?></span>
                                     </div>
                                 </div>
                             </div>
                             <div class="ml-auto text-right d-flex align-items-center" style="gap: 8px">
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-light border-0 rounded-xl px-3 font-weight-bold shadow-sm" style="height: 38px" data-toggle="dropdown" title="Warna Reading Mode">
                                            <i class="fas fa-palette text-warning"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right rounded-xl shadow border-0">
                                            <a class="dropdown-item py-2" href="javascript:void(0)" onclick="setTheme('light')"><i class="fas fa-sun mr-2 text-warning"></i> Light (Default)</a>
                                            <a class="dropdown-item py-2" href="javascript:void(0)" onclick="setTheme('sepia')"><i class="fas fa-book-open mr-2 text-primary"></i> Sepia</a>
                                        </div>
                                    </div>
                             </div>
                         </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-exam">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <div class="d-flex align-items-center">
                                    <div id="nomor-soal" class="nomor-badge">1</div>
                                </div>
                                
                                <div class="d-flex align-items-center header-actions" style="gap: 15px">
                                    <div class="timer-pill" onclick="showTimerInfo()" style="cursor: pointer" title="Klik untuk info waktu">
                                        <i class="fas fa-clock"></i>
                                        <div class="d-flex flex-column" style="line-height: 1.2">
                                            <span class="timer-label">SISA WAKTU</span>
                                            <span id="timer">00:00:00</span>
                                        </div>
                                    </div>
                                    <button onclick="toggleFokusMode()" class="btn btn-light border-0 rounded-xl px-3 font-weight-bold shadow-sm btn-header-mobile" title="Mode Fokus / Reading Mode">
                                        <i class="fas fa-expand text-info"></i>
                                    </button>
                                    
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-light border-0 rounded-xl px-3 font-weight-bold shadow-sm btn-header-mobile" data-toggle="dropdown" data-display="static" title="Zoom Soal & Jawaban">
                                            <i class="fas fa-search-plus text-primary"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right rounded-2xl shadow-lg border-0 p-3" id="zoom-dropdown" style="min-width: 220px;">
                                            <div class="text-center mb-2">
                                                <h6 class="m-0 font-weight-bold text-dark" style="font-size: 0.85rem">ZOOM KONTEN</h6>
                                            </div>
                                            <div class="zoom-tool-bar"></div>
                                        </div>
                                    </div>

                                    <button data-toggle="modal" data-target="#daftarModal" class="btn btn-light border-0 rounded-xl px-3 font-weight-bold btn-header-mobile">
                                        <i class="fa fa-th mr-2 text-primary"></i> <span class="d-none d-md-inline">DAFTAR SOAL</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-body p-4 p-md-5">
                            <div class="konten-soal-jawab">
                                <!-- Panel Pertanyaan -->
                                <div class="question-section">
                                    <div class="section-header-bar header-pertanyaan">
                                        <span><i class="fas fa-question-circle mr-2"></i> PERTANYAAN: <span id="soal-type-label" class="ml-1">...</span></span>
                                    </div>
                                    <div class="section-body">
                                        <div id="konten-soal" class="question-content"></div>
                                    </div>
                                </div>
                                
                                <?= form_open('jawab', array('id' => 'jawab')) ?>
                                <input type="hidden" name="siswa" value="<?= $siswa->id_siswa ?>">
                                <input type="hidden" name="jadwal" value="<?= $jadwal->id_jadwal ?>">
                                <input type="hidden" name="bank" value="<?= $jadwal->id_bank ?>">
                                
                                <!-- Panel Jawaban -->
                                <div class="answer-section">
                                    <div class="section-header-bar header-jawaban">
                                        <span><i class="fas fa-pencil-alt mr-2"></i> Area Jawaban</span>
                                    </div>
                                    <div class="section-body pt-4">
                                        <div id="konten-jawaban" class="w-100"></div>
                                    </div>
                                </div>
                                <?= form_close() ?>
                            </div>
                        </div>
                        
                        <div class="card-footer p-4 border-top">
                            <div class="d-flex justify-content-between align-items-center">
                                <button class="nav-btn nav-btn-prev" id="prev" onclick="prevSoal()">
                                    <i class="fa fa-chevron-left mr-2"></i> Sebelumnya
                                </button>
                                
                                <div id="timer-wrapper" class="ml-auto">
                                    <button class="nav-btn btn-danger d-none" id="timer-selesai" disabled></button>
                                    <button class="nav-btn nav-btn-next" id="next" onclick="nextSoal()">
                                        <span id="text-next">Berikutnya</span> <i class="fa fa-chevron-right ml-2" id="ic-next-arrow"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="overlay-modern d-none" id="loading">
                            <div class="skeleton-line w-25 mb-2"></div>
                             <div class="skeleton-block w-100 mb-4"></div>
                            <div class="skeleton-option w-100 mb-2"></div>
                            <div class="skeleton-option w-100 mb-2"></div>
                            <div class="skeleton-option w-100 mb-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="daftarModal" tabindex="-1" role="dialog" aria-labelledby="daftarLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="daftarLabel">Daftar Nomor Soal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid" id="konten-modal">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
            </div>
        </div>
    </div>
</div>

<?= form_open('', array('id' => 'up')) ?>
<input type="hidden" name="siswa" value="<?= $siswa->id_siswa ?>">
<input type="hidden" name="jadwal" value="<?= $jadwal->id_jadwal ?>">
<input type="hidden" name="bank" value="<?= $jadwal->id_bank ?>">
<?= form_close() ?>

<script src="<?= base_url() ?>/assets/app/js/redirect.js"></script>
<script src="<?= base_url() ?>/assets/app/js/linker-list.js"></script>
<script src="<?= base_url() ?>/assets/plugins/element-queries/ElementQueries.js"></script>
<script src="<?= base_url() ?>/assets/plugins/element-queries/ResizeSensor.js"></script>
<script src="<?= base_url() ?>/assets/plugins/katex/katex.min.js"></script>
<script src="<?= base_url() ?>/assets/app/js/content-zoom-slider.js"></script>

<script>
    var elem = document.documentElement;
    history.pushState(null, null, '<?php echo $_SERVER["REQUEST_URI"]; ?>');
    window.addEventListener('popstate', function (event) {
        loadSoalNomor(1);
    });
    const infoJadwal = JSON.parse(JSON.stringify(<?= json_encode($jadwal) ?>));
    let nomorSoal = 0;
    let idSoal, idSoalSiswa, jenisSoal, modelSoal, typeSoal;
    let jawabanSiswa, jawabanBaru = null, jsonJawaban;
    let nav = 0;
    let soalTerjawab = 0, soalTotal = 0;
    let timerOut;
    let timerSelesai;
    //const durasi = JSON.parse(JSON.stringify(<?= json_encode($elapsed) ?>));
    let elapsed = '0';
    let h, m, s;
    var message = "Jangan menggunakan klik kanan!";

    let tick = 0;
    const _second = 1000,
        _minute = _second * 60,
        _hour = _minute * 60,
        _day = _hour * 24;
    const durasiUjian = Number(infoJadwal.durasi_ujian);
    let dif;
    let fieldLinks;
    let zoomClicked = 1;
    var arrSize = [];

    $(document).ready(function () {
        $(document).keydown(function (event) {
            //console.log('press', event.keyCode);
            var charCode = event.charCode || event.keyCode || event.which;
            if (charCode == 27 || charCode == 91 || charCode == 92) {
                return false;
            }
        });

        $('#zoom-dropdown').on('click', function (e) {
             e.stopPropagation();
        });

        document.onmousedown = rtclickcheck;
        swal.fire({
            title: 'Peraturan Ujian',
            html: 'Kerjakan soal dengan serius,<br>jangan nyontek!',
            // showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya',
            allowOutsideClick: false
        }).then((result) => {
            if (result.value) {
                openFullscreen();
            }
        });

        $('#jawab').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            var siswa = $('#up').find('input[name="siswa"]').val();
            var bank = $('#up').find('input[name="bank"]').val();


            let formData = new FormData($('#jawab')[0]);
            formData.append('siswa', siswa)
            formData.append('bank', bank)

            const jns = jsonJawaban['jenis']
            for (const key in jsonJawaban) {
                if ((jns==='2' || jns==='3') && key === 'jawaban_siswa') {
                    formData.append('data['+key+']', JSON.stringify(jsonJawaban[key]))
                } else {
                    formData.append('data['+key+']', jsonJawaban[key])
                }
            }

            $.ajax({
                url: base_url + 'siswa/savejawaban',
                method: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                success: function (response) {
                    soalTerjawab = response.soal_terjawab;
                    loadSoalNomor(nav);
                },
                error: function (xhr, error, status) {
                    showDangerToast('ERROR!');
                    console.log(xhr.responseText);
                }
            });
        });

        $(".question-content, #konten-jawaban").contentZoomSlider({
            toolContainer: ".zoom-tool-bar",
        });

        loadSoalNomor(1);
    });

    function showTimerInfo() {
        var minimal = <?= $jadwal->jarak ?>; // Assuming 'jarak' is used for min duration, or verify available vars
        swal.fire({
            title: 'Informasi Waktu',
            html: `
                <div class="text-left">
                    <p class="mb-2"><b>Sisa Waktu:</b> Waktu tersisa untuk mengerjakan ujian.</p>
                    <p class="mb-2"><b>Minimal Pengerjaan:</b> ${minimal} menit untuk bisa menyelesaikan ujian.</p>
                    <hr>
                    <div class="alert alert-soft-info mb-0">
                        <i class="fas fa-info-circle mr-1"></i> Informasi untuk menyelesaikan ujian ada di <b>Soal Nomor Terakhir</b>.
                    </div>
                </div>
            `,
            icon: 'info',
            confirmButtonText: 'Mengerti',
            customClass: {
                popup: 'rounded-xl',
                confirmButton: 'px-4 rounded-pill font-weight-bold'
            }
        });
    }

    function setTheme(theme) {
        $('body').removeClass('theme-sepia theme-dark');
        if (theme === 'sepia') {
            $('body').addClass('theme-sepia');
        } else if (theme === 'dark') {
            $('body').addClass('theme-dark');
        }
        localStorage.setItem('exam_theme', theme);
    }

    // Load saved theme
    $(document).ready(function() {
        var savedTheme = localStorage.getItem('exam_theme');
        if (savedTheme) setTheme(savedTheme);
    });


    function toggleFokusMode() {
        $('#info-siswa-row').slideToggle();
        var icon = $('button[title="Mode Fokus / Reading Mode"] i');
        if (icon.hasClass('fa-expand')) {
            icon.removeClass('fa-expand').addClass('fa-compress');
        } else {
            icon.removeClass('fa-compress').addClass('fa-expand');
        }
    }

    function loadSoalNomor(nomor) {
        if (nomor == nomorSoal) {
            return;
        }
        var dataPost = $('#up').serialize() + '&nomor=' + nomor + '&timer=' + $('#timer').text() + '&elapsed=' + elapsed;
        //console.log('res', dataPost);
        if (soalTotal === 0 || nomor <= parseInt(soalTotal)) {
            $.ajax({
                type: 'POST',
                url: base_url + 'siswa/loadnomorsoal',
                data: dataPost,
                success: function (data) {
                    console.log('load soal', data);
                    $('#loading').addClass('d-none');
                    setKonten(data);
                }, error: function (xhr, error, status) {
                    showDangerToast('ERROR!');
                    console.log(xhr.responseText);
                }
            });
        } else {
            selesai();
        }
    }

    function loadSoal(datas) {
        $('#daftarModal').modal('hide').data('bs.modal', null);
        $('#daftarModal').on('hidden', function () {
            $(this).data('modal', null);
        });

        nav = $(datas).data('nomorsoal');
        var jwb1 = jawabanSiswa;
        var jwb2 = jawabanBaru;
        if ($.isArray(jwb1) || jwb1 instanceof jQuery) {
            jwb1 = JSON.stringify(jwb1)
        }
        if (jwb2 != null && ($.isArray(jwb2) || jwb2 instanceof jQuery)) {
            jwb2 = JSON.stringify(jwb2)
        }

        if (jawabanBaru != null && jwb1 !== jwb2) {
            $('#jawab').submit();
        } else {
            loadSoalNomor(nav);
        }
    }

    function setKonten(data) {
        //console.log('max_jawaban', data.max_jawaban);
        idSoal = data.soal_id;
        idSoalSiswa = data.soal_siswa_id;
        nomorSoal = parseInt(data.soal_nomor);
        jenisSoal = data.soal_jenis;
        soalTerjawab = data.soal_terjawab;
        soalTotal = data.soal_total;

        jsonJawaban = {};
        jawabanBaru = null;
        jawabanSiswa = data.soal_jawaban_siswa != null ? data.soal_jawaban_siswa : '';
        if ($.isArray(jawabanSiswa)) jawabanSiswa.sort();

        if (nomorSoal === 1) {
            $('#prev').attr('disabled', 'disabled').addClass('d-none');
        } else {
            $('#prev').removeAttr('disabled').removeClass('d-none');
        }

        $('#nomor-soal').html(nomorSoal);
        $('#konten-soal').html(data.soal_soal);
        var jenis = data.soal_jenis;
        var tipeSoal = '';
        if (jenis == "1") tipeSoal = 'PILIHAN GANDA';
        else if (jenis == "2") tipeSoal = 'PILIHAN GANDA KOMPLEKS';
        else if (jenis == "3") tipeSoal = 'MENJODOHKAN';
        else if (jenis == "4") tipeSoal = 'ISIAN SINGKAT';
        else tipeSoal = 'URAIAN / ESSAI';
        
        $('#soal-type-label').text(tipeSoal);

        var html = '';
        if (jenis == "1") {
            $.each(data.soal_opsi, function (key, opsis) {
                if (opsis.valAlias != "") {
                    html += '<label class="container-jawaban font-weight-normal">' + opsis.opsi +
                        '<input type="radio"' +
                        ' name="jawaban"' +
                        ' value="' + opsis.value.toUpperCase() + '"' +
                        ' data-jawabansiswa="' + opsis.value.toUpperCase() + '"' +
                        ' data-jawabanalias="' + opsis.valAlias.toUpperCase() + '"' +
                        ' onclick="submitJawaban(this)" ' + opsis.checked + '>' +
                        '<span class="checkmark shadow text-center align-middle">' + opsis.valAlias.toUpperCase() + '</span>' +
                        '</label>';
                }
            });
            $('#konten-jawaban').html(html);
        } else if (jenis == "2") {
            $.each(data.soal_opsi, function (key, opsis) {
                html += '<label class="container-jawaban font-weight-normal">' + opsis.opsi +
                    '<input type="checkbox" class="check2"' +
                    ' id="check'+key+'"' +
                    ' name="jawaban"' +
                    ' value="' + opsis.value.toUpperCase() + '"' +
                    ' data-max="' + data.max_jawaban[0] + '"' +
                    ' data-jawabansiswa="' + opsis.value.toUpperCase() + '"' +
                    ' onclick="submitJawaban(this)" ' + opsis.checked + '>' +
                    '<span class="checkmark shadow text-center align-middle">' +
                    '<i class="fas fa-check"></i>' +
                    '</span>' +
                    '</label>';
            });
            $('#konten-jawaban').html(html);
        } else if (jenis == "3") {
            modelSoal = data.soal_opsi.model;
            typeSoal = data.soal_opsi.type;
            let konten = $('#konten-jawaban')
            konten.html('');

            const dataJawab = data.soal_opsi
            const copy = $.extend(true, {}, dataJawab);
            //console.log('test', copy)

            let arrData = [copy.tabel[0]]
            if (Array.isArray(copy.tbody)) {
                for (let i = 0; i < copy.tbody.length; i++) {
                    let val = copy.tbody[i]
                    for (let j = 0; j < val.length; j++) {
                        if (j === 0) val[j] = copy.tabel[i+1][0]
                    }
                    arrData.push(val)
                }
            } else {
                for (let i = 0; i < copy.tabel.length; i++) {
                    let val = copy.tbody[i]
                    if (val) {
                        for (let j = 0; j < val.length; j++) {
                            if (j === 0) val[j] = copy.tabel[i][0]
                        }
                        arrData.push(val)
                    }
                }
            }

            let keys = 0
            let dataMax = {}
            $.each(data.max_jawaban, function (key, val) {
                dataMax[keys] = val
                keys ++
            })

            let objJawaban = {
                jawaban: arrData,
                max: dataMax,
                model: modelSoal,
                type: typeSoal,
            }
            //console.log('obj', objJawaban)
            konten.linkerList({
                enableEditor: false,
                data: objJawaban,
                viewMode: '2',
                id: nomorSoal,
                callback: function (id, data, hasLinks, isOffset) {
                    if (isOffset !== '0') {
                        $.toast({
                            heading: '<span><i class="fas fa-sparkles"></i> ASISTEN CBT</span>',
                            text: 'Peringatan: Kamu hanya boleh memilih maksimal <b>' + isOffset + ' jawaban</b> untuk soal ini.',
                            showHideTransition: 'fade',
                            icon: 'info',
                            loaderBg: '#6366f1',
                            position: 'bottom-center',
                            hideAfter: 4000
                        })
                    } else {
                        submitJawaban(data)
                    }
                }
            });
        } else if (jenis == "4") {
            html += '<div class="pr-md-4">' +
                '<div class="row"><div class="col-12 col-sm-8 col-md-6 col-lg-4 col-xl-4">'+
                '<input id="jawaban-isian" class="pl-2 form-control" type="text"' +
                ' name="jawaban" value="' + jawabanSiswa + '"' +
                ' placeholder="Tulis jawaban singkat disini..."/><br>' +
                '</div></div>' +
                '</div>';
            $('#konten-jawaban').html(html);

            $("#jawaban-isian").on('change keyup paste', function () {
                submitJawaban(null);
            });
        } else {
            html += '<div class="pr-md-4">' +
                '<textarea id="jawaban-essai" class="w-100 pl-1" type="text"' +
                ' name="jawaban" rows="4"' +
                ' placeholder="Tulis jawaban disini">' + jawabanSiswa + '</textarea><br>' +
                '</div>';
            $('#konten-jawaban').html(html);

            $('#jawaban-essai').summernote({
                placeholder: 'Tulis Jawaban disini ...',
                tabsize: 2,
                minHeight: 150,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                ],
                disableDragAndDrop: true,
                callbacks: {
                    onKeyup: function(e) {
                        submitJawaban(null);
                    },
                    onChange: function(contents, $editable) {
                        submitJawaban(null);
                    },
                    onPaste: function (e) {
                        e.preventDefault();
                        // Optional: Allow plain text paste only if really needed, but strict prevention is safer against cheating
                        // var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                        // document.execCommand('insertText', false, bufferText);
                        $.toast({
                            heading: '<span><i class="fas fa-shield-alt"></i> SECURITY SYSTEM</span>',
                            text: 'Maaf, fitur Copy-Paste telah dinonaktifkan demi integritas ujian.',
                            showHideTransition: 'fade',
                            icon: 'error',
                            loaderBg: '#ef4444',
                            position: 'top-center',
                            hideAfter: 3500
                        });
                    }
                }
            });
        }

        $('#konten-modal').html(data.soal_modal);

        var $imgs = $('.konten-soal-jawab').find('img');
        $.each($imgs, function () {
            var curSrc = $(this).attr('src');
            if (!curSrc.includes("uploads")) return;
            var newSrc = '';
            if (curSrc.indexOf("http") === -1 && curSrc.indexOf("data:image") === -1) {
                newSrc = base_url + curSrc;
                $(this).attr('src', newSrc);
            } else if (curSrc.indexOf(base_url) === -1) {
                var pathUpload = 'uploads';
                var forReplace = curSrc.split(pathUpload);
                newSrc = base_url + pathUpload + forReplace[1];
                $(this).attr('src', newSrc);
				$(this).removeAttr('alt');
            }
            $(this).on('load', function () {
                if ($(this).height() > 50) {
                    $(this).addClass('img-fluid');
                }
            });
        });

        $('video').css({'width': '100%', 'max-height': '100%'});

        $('.check').change(function (e) {
            var row = $(e.target).closest('tr');
            var isChecked = $(row).find("input:checked");
            var max = $(e.target).data('max');
            if (isChecked.length > max) {
                $(e.target).prop('checked', !$(this).prop('checked'));
                $.toast({
                    heading: '<span><i class="fas fa-robot"></i> AI VALIDATOR</span>',
                    text: 'Oops! Kamu sudah mencapai batas maksimal <b>' + max + ' jawaban</b>.',
                    showHideTransition: 'fade',
                    icon: 'warning',
                    loaderBg: '#f59e0b',
                    position: 'bottom-center',
                    hideAfter: 3000
                })
            } else {
                submitJawaban(null);
            }
        });

        if (!data.durasi) {
            window.location.href = base_url + 'siswa/cbt';
        } else {
            setElapsed(data.durasi);

            if (timerSelesai) {
                clearTimeout(timerSelesai);
                timerSelesai = null;
            }

            var next = $('#next');
            next.removeAttr('disabled');
            var txtnext = $('#text-next');
            $('#ic-btn').remove();

            if (soalTotal === nomorSoal && data.durasi.mulai != null && data.durasi.mulai != '0') {
                next.removeClass('nav-btn-next');
                next.addClass('nav-btn-finish');
                $('#ic-next-arrow').removeClass('fa-chevron-right').addClass('fa-check-circle');
                txtnext.html('Selesai');
                setTimerSelesai(next, data.durasi);
            } else {
                $('#timer-selesai').addClass('d-none');
                next.removeClass('d-none');
                next.removeClass('nav-btn-finish');
                next.addClass('nav-btn-next');
                $('#ic-next-arrow').removeClass('fa-check-circle').addClass('fa-chevron-right');
                txtnext.html('Berikutnya');
            }
        }

        arrSize = [];
    }

    function setElapsed(durasi) {
        elapsed = durasi.lama_ujian == null || durasi.lama_ujian == '0' ? "00:00:00" : durasi.lama_ujian;
        createTimerCountdown(durasiUjian, elapsed.split(':'), function (isOver, remaining, onGoing) {
            $('#timer').html(remaining);
            elapsed = onGoing;
            if (isOver) {
                $('#prev').attr('disabled', 'disabled');
                $('#next').attr('disabled', 'disabled');

                var siswa = $('#up').find('input[name="siswa"]').val();
                var bank = $('#up').find('input[name="bank"]').val();
                var jadwal = $('#up').find('input[name="jadwal"]').val();

                $.ajax({
                    url: base_url + 'siswa/savejawaban',
                    method: 'POST',
                    data: $('#jawab').serialize() + '&jadwal=' + jadwal + '&siswa=' + siswa + '&bank=' + bank +
                        '&waktu=' + $('#timer').text() + '&elapsed=' + elapsed + '&data=' + JSON.stringify(jsonJawaban),
                    success: function (response) {
                        $('.konten-soal-jawab').html('');
                        dialogWaktu();
                    },
                    error: function (xhr, error, status) {
                        console.log(xhr.responseText);
                    }
                });
            }
        })
    }

    function nextSoal() {
        $('#next').attr('disabled', 'disabled');
        $('#loading').removeClass('d-none');
        nav = (nomorSoal + 1);
        var jwb1 = jawabanSiswa;
        var jwb2 = jawabanBaru;
        if ($.isArray(jwb1) || jwb1 instanceof jQuery) {
            jwb1 = JSON.stringify(jwb1)
        }
        if (jwb2 != null && ($.isArray(jwb2) || jwb2 instanceof jQuery)) {
            jwb2 = JSON.stringify(jwb2)
        }

        if (jawabanBaru != null && jwb1 !== jwb2) {
            $('#jawab').submit();
        } else {
            loadSoalNomor(nav);
        }
    }

    function setTimerSelesai(next, durasi) {
        const perdetik = 1000;
        const permenit = 60 * perdetik;
        const perjam = 60 * permenit;
        const t_dur = Number(infoJadwal.jarak) * (1000 * 60);

        const elapsed = (durasi.lama_ujian == null || durasi.lama_ujian == '0' ? "00:00:00" : durasi.lama_ujian).split(':');
        let t_jam = Number(elapsed[0]);
        let t_mnt = Number(elapsed[1]);
        let t_dtk = Number(elapsed[2]);

        const btnTimer = $('#timer-selesai');
        setTimer();

        function setTimer() {
            if (timerSelesai) {
                clearTimeout(timerSelesai);
                timerSelesai = null;
            }

            const elapsedMicro = (t_jam * perjam) + (t_mnt * permenit) + (t_dtk * perdetik);
            const t_remaining = t_dur - elapsedMicro;
            if (t_remaining <= 0) {
                next.removeClass('d-none');
                btnTimer.addClass('d-none');
            } else {
                // elapsed
                t_dtk++;
                if (t_dtk > 59) {
                    t_dtk = 0;
                    t_mnt++;
                }
                if (t_mnt > 59) {
                    t_mnt = 0;
                    t_jam++;
                }

                // remaining
                const r_jam = Math.floor(t_remaining / perjam);
                const r_mnt = Math.floor((t_remaining % perjam) / permenit);
                const r_dtk = Math.floor((t_remaining % permenit) / perdetik);
                next.addClass('d-none');
                btnTimer.removeClass('d-none');
                btnTimer.html(zeroPad(r_jam) + ':' + zeroPad(r_mnt) + ':' + zeroPad(r_dtk));

                timerSelesai = setTimeout(setTimer, 1000);
            }
        }
    }

    function prevSoal() {
        $('#prev').attr('disabled', 'disabled');
        $('#loading').removeClass('d-none');
        nav = (nomorSoal - 1);
        var jwb1 = jawabanSiswa;
        var jwb2 = jawabanBaru;
        if ($.isArray(jwb1) || jwb1 instanceof jQuery) {
            jwb1 = JSON.stringify(jwb1)
        }
        if (jwb2 != null && ($.isArray(jwb2) || jwb2 instanceof jQuery)) {
            jwb2 = JSON.stringify(jwb2)
        }

        if (jawabanBaru != null && jwb1 !== jwb2) {
            $('#jawab').submit();
        } else {
            loadSoalNomor(nav);
        }
    }

    function updateModal(jwb) {
        var badges = $('#konten-modal').find(`#badge${nomorSoal}`);
        var btn = $('#konten-modal').find(`#btn${nomorSoal}`);
        btn.removeClass("btn-outline-secondary");
        btn.addClass("btn-primary");
        if (jenisSoal == 1) {
            if (badges.length) {
                $(`#badge${nomorSoal}`).text(jwb)
            } else {
                var badge = '<div id="badge' + nomorSoal + '" class="badge badge-pill badge-success border border-dark text-yellow"' +
                    ' style="font-size:12pt; width: 30px; height: 30px; margin-top: -60px; margin-left: 30px;">' +
                    jwb +
                    '</div>';
                $(`#box${nomorSoal}`).append(badge);
            }
        } else {
            if (!badges.length) {
                var badge = '<div id="badge' + nomorSoal + '" class="badge badge-pill badge-success border border-dark"' +
                    ' style="font-size:12pt; width: 30px; height: 30px; margin-top: -60px; margin-left: 30px;">' +
                    '&check;</div>';
                $(`#box${nomorSoal}`).append(badge);
            }
        }
    }

    function submitJawaban(opsi) {
        var jawaban_Siswa = '', jawaban_Alias = '';
        if (jenisSoal == 1) {
            jawaban_Siswa = $(opsi).data('jawabansiswa');
            jawaban_Alias = $(opsi).data('jawabanalias');
        } else if (jenisSoal == 2) {
            var isChecked = $('#konten-jawaban').find("input:checked");
            var max = $(opsi).data('max');
            //console.log('max:'+max, 'checked:'+isChecked.length);
            if (isChecked.length > max) {
                $(opsi).prop('checked', !$(opsi).prop('checked'));
                $.toast({
                    heading: 'Warning',
                    text: 'Maksimal <b>' + max + ' jawaban',
                    showHideTransition: 'slide',
                    icon: 'error',
                    loaderBg: '#f2a654',
                    position: 'bottom-center'
                });
                return;
            } else {
                var selected = [];
                $('#konten-jawaban input:checked').each(function () {
                    selected.push($(this).val());
                });
                jawaban_Siswa = selected;
            }
        } else if (jenisSoal == 3) {
            jawaban_Siswa = opsi
        } else if (jenisSoal == 4){
            jawaban_Siswa = $('#jawaban-isian').val();
        } else {
            jawaban_Siswa = $('#jawaban-essai').summernote('code');
        }
        jawabanBaru = jawaban_Siswa;
        if (jenisSoal == 2) {
            if ($.isArray(jawabanBaru)) jawabanBaru.sort();
        }

        updateModal(jawaban_Alias);
        jsonJawaban = createJsonJawaban(jawaban_Alias, jawaban_Siswa);
        console.log('getJawaban', jsonJawaban)
    }

    function createJsonJawaban(jawab_Alias, jawab_Siswa) {
        var siswa = $('#up').find('input[name="siswa"]').val();
        var jadwal = $('#up').find('input[name="jadwal"]').val();
        var bank = $('#up').find('input[name="bank"]').val();

        var item = {};
        item ["no_soal_alias"] = nomorSoal;
        item ["jawaban_alias"] = jawab_Alias;
        item ["jawaban_siswa"] = jawab_Siswa;
        item ["jenis"] = jenisSoal;
        item ["id_soal"] = idSoal;
        item ["id_soal_siswa"] = idSoalSiswa;
        item ["id_jadwal"] = jadwal;
        item ["id_bank"] = bank;
        item ["id_siswa"] = siswa;

        return item;
    }

    function getDataTable() {
        var tbl = $('#table-jodohkan tr').get().map(function (row) {
            var $tables = [];

            $(row).find('th').get().map(function (cell) {
                var klm = $(cell).text().trim();
                $tables.push(klm == "" ? "#" : encode(klm));
            });

            $(row).find('td').get().map(function (cell) {
                if ($(cell).children('input').length > 0) {
                    $tables.push($(cell).find('input').prop("checked") === true ? "1" : "0");
                } else {
                    $tables.push(encode($(cell).text().trim()))
                }
            });

            return $tables;
        });
        return tbl;
    }

    function convertTable(data) {
        const head = []
        const body = []
        $.each(data.tabel, function (idx, val) {
            if (idx === 0) {
                $.each(val, function (id, vl) {
                    if (vl !== "#") head.push(encode(vl))
                })
            } else {
                $.each(val, function (id, vl) {
                    if (id === 0) body.push(encode(vl))
                })
            }
        })
        var kanan = data.thead;
        var kiri = [];
        $.each(data.tbody, function (i, v) {
            kiri.push(encode(v.shift()));
        });
        kanan.shift();

        var linked = [];
        $.each(data.tbody, function (n, arv) {
            $.each(arv, function (t, v) {
                if (v == '1') {
                    var it = {};
                    it['from'] = encode(body[n]);
                    it['to'] = encode(head[t]);
                    linked.push(it);
                }
            });
        });
        var item = {};
        item['type'] = data.type;
        item['jawaban'] = [body, head];
        item['linked'] = linked;
        return item;
    }

    function convertTableToList(data) {
        var kanan = data.thead;
        //console.log('kanan', kanan);
        var kiri = [];
        $.each(data.tbody, function (i, v) {
            kiri.push(decode(v.shift()));
        });
        kanan.shift();
        //console.log('kiri', kiri);
        $.each(kanan, function (i, v) {
            kanan[i] = (decode(v));
        });

        var linked = [];
        $.each(data.tbody, function (n, arv) {
            $.each(arv, function (t, v) {
                if (v == '1') {
                    var it = {};
                    it['from'] = decode(kiri[n]);
                    it['to'] = decode(kanan[t]);
                    linked.push(it);
                }
            });
        });
        var item = {};
        item['type'] = data.type;
        item['jawaban'] = [kiri, kanan];
        item['linked'] = linked;
        //console.log('test', item);
        return item;
    }

    function getListData() {
        var kolom = [];
        var baris = [];
        $(".FL-left li").each(function () {
            baris.push(encode($(this).text()));
        });
        $(".FL-right li").each(function () {
            kolom.push(encode($(this).text()));
        });
        return [kolom, baris];
    }

    function selesai() {
        if (soalTotal === soalTerjawab) {
            swal.fire({
                title: "Kamu yakin?",
                text: "Kamu akan menyelesaikan ujian",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Selesaikan!"
            }).then(result => {
                if (result.value) {
                    $.ajax({
                        url: base_url + 'siswa/selesaiujian',
                        method: "POST",
                        data: $('#up').serialize(),
                        success: function (respon) {
                            $('#next').removeAttr('disabled');
                            $('#loading').addClass('d-none');
                            //console.log(respon);
                            if (respon.status) {
                                window.location.href = base_url + 'siswa/cbt';
                            } else {
                                swal.fire({
                                    title: "Gagal",
                                    text: "Tidak bisa menyelesaikan ujian",
                                    icon: "error"
                                });
                            }
                        },
                        error: function (xhr, error, status) {
                            console.log(xhr.responseText);
                            swal.fire({
                                title: "Gagal",
                                text: "Tidak bisa menyelesaikan ujian",
                                icon: "error"
                            });
                        }
                    });
                } else {
                    $('#next').removeAttr('disabled');
                    $('#loading').addClass('d-none');
                }
            });
        } else {
            swal.fire({
                title: "BELUM SELESAI!",
                text: "Masih ada soal yang belum dikerjakan",
                icon: "error",
                confirmButtonColor: "#3085d6",
            }).then(result => {
                if (result.value) {
                    $('#next').removeAttr('disabled');
                    $('#loading').addClass('d-none');
                }
            });
        }
    }

    function dialogWaktu() {
        swal.fire({
            title: "Sudah Habis",
            text: "Waktu Ujian sudah habis, hubungi proktor",
            icon: "warning",
            allowOutsideClick: false,
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
        }).then(result => {
            if (result.value) {
                window.location.href = base_url + 'siswa/cbt';
            }
        });
    }

    function rtclickcheck(keyp) {
        if (navigator.appName == "Netscape" && keyp.which == 3) {
            alert(message);
            return false;
        }

        if (navigator.appVersion.indexOf("MSIE") != -1 && event.button == 2) {
            alert(message);
            return false;
        }
    }

    function openFullscreen() {
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.mozRequestFullScreen) {
            /* Firefox */
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullscreen) {
            /* Chrome, Safari & Opera */
            elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) {
            /* IE/Edge */
            elem = window.top.document.body; //To break out of frame in IE
            elem.msRequestFullscreen();
        }
    }

    function getMinutes(startTime) {
        var endTime = new Date();
        endTime.setHours(endTime.getHours() - startTime.getHours());
        endTime.setMinutes(endTime.getMinutes() - startTime.getMinutes());
        endTime.setSeconds(endTime.getSeconds() - startTime.getSeconds());

        return {h: endTime.getHours(), m: endTime.getMinutes(), s: endTime.getSeconds()}
    }

    function createTimerCountdown(durasi, elapsed, func) {
        const perdetik = 1000;
        const permenit = 60 * perdetik;
        const perjam = 60 * permenit;
        const t_dur = durasi * (1000 * 60);

        let t_jam = Number(elapsed[0]);
        let t_mnt = Number(elapsed[1]);
        let t_dtk = Number(elapsed[2]);

        testTimer();

        function testTimer() {
            if (timerOut) {
                clearTimeout(timerOut);
                timerOut = null;
            }

            const elapsedMicro = (t_jam * perjam) + (t_mnt * permenit) + (t_dtk * perdetik);
            const t_remaining = t_dur - elapsedMicro;
            if (t_remaining <= 0) {
                if (func && (typeof func == "function")) {
                    func(true, 'Waktu habis', zeroPad(t_jam) + ':' + zeroPad(t_mnt) + ':' + zeroPad(t_dtk));
                }
            } else {
                // elapsed
                t_dtk++;
                if (t_dtk > 59) {
                    t_dtk = 0;
                    t_mnt++;
                }
                if (t_mnt > 59) {
                    t_mnt = 0;
                    t_jam++;
                }

                // remaining
                const r_jam = Math.floor(t_remaining / perjam);
                const r_mnt = Math.floor((t_remaining % perjam) / permenit);
                const r_dtk = Math.floor((t_remaining % permenit) / perdetik);

                if (func && (typeof func == "function")) {
                    func(false,
                        zeroPad(r_jam) + ':' + zeroPad(r_mnt) + ':' + zeroPad(r_dtk),
                        zeroPad(t_jam) + ':' + zeroPad(t_mnt) + ':' + zeroPad(t_dtk)
                    );
                }
                timerOut = setTimeout(testTimer, 1000);
            }
        }
    }

    function zeroPad(no) {
        return no < 10 ? '0' + no : no;
    }

    function encode(str) {
        var decoded = decodeURIComponent(str)
        var isEncoded = decoded !== str
        var encoded = encodeURIComponent(str)
        if (isEncoded) {
            return str
        } else {
            return encoded
        }
    }

    function decode(str) {
        var decoded = decodeURIComponent(str)
        var encoded = encodeURIComponent(decoded)
        var isEncoded = encoded === str
        if (isEncoded) {
            return decoded
        } else {
            return str
        }
    }

    document.addEventListener("visibilitychange", () => {
        if (document.hidden && infoJadwal.reset_login === '1') {
            location.href=base_url+"siswa/leavecbt/<?= $jadwal->id_jadwal ?>/<?= $siswa->id_siswa ?>";
        }
    });

    function transformToFormData(data, formData=(new FormData), parentKey=null) {
        $.each(data, function (value, key) {
            if (value === null) return; // else "null" will be added
            //let formattedKey = _.isEmpty(parentKey) ? key : `${parentKey}[${key}]`;
            let formattedKey = parentKey ? `${parentKey}[${key}]` : key
            if (value instanceof Array){
                $.each(value, function (ele) {
                    formData.append(`${formattedKey}[]`, ele)
                });
            } else if (value instanceof Object) {
                transformToFormData(value, formData, formattedKey)
            } else {
                formData.set(formattedKey, value)
            }
        })
        return formData
    }
</script>

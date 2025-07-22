<div class="ktp-container" style="position: relative; margin-left: auto; margin-right: auto; overflow: hidden; font-family: sans-serif; width: 856px; height: 540px; background: linear-gradient(135deg, #1e40af 0%, #3b82f6 50%, #60a5fa 100%); border-radius: 12px; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3); border: 2px solid #1e40af;">

    <header class="ktp-header" style="padding-top: 8px; padding-bottom: 8px; text-align: center; background: rgba(0,0,0,0.1);">
        <h1 style="margin-bottom: 0; font-size: 18px; font-weight: bold; color: #fff;">REPUBLIK INDONESIA</h1>
        <h2 style="margin-top: 0; font-size: 24px; font-weight: bold; letter-spacing: 0.05em; color: #facc15; text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">KARTU TANDA PENDUDUK</h2>
    </header>

    <main class="ktp-content" style="display: flex; padding: 16px; margin-left: 16px; margin-right: 16px; border-radius: 8px; height: 420px; background: linear-gradient(to bottom, #ffffff 0%, #f8fafc 100%); box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);">

        <section class="left-section" style="display: flex; flex-direction: column; align-items: center; width: 33.333333%; padding-right: 16px;">
            <div class="photo-container" style="margin-top: 8px; margin-bottom: 16px;">
                <div style="display: flex; align-items: center; justify-content: center; width: 128px; height: 160px; overflow: hidden; font-size: 14px; color: #6b7280; border: 2px solid #9ca3af;
                    background:
                        repeating-linear-gradient(45deg, #f3f4f6, #f3f4f6 5px, transparent 5px, transparent 10px),
                        repeating-linear-gradient(-45deg, #f3f4f6, #f3f4f6 5px, transparent 5px, transparent 10px);
                    background-size: 10px 10px;
                    background-position: 0 0;
                ">
                    @if ($ktpData['photo_url'])
                        <img src="{{ $ktpData['photo_url'] }}" alt="KTP Photo" style="object-fit: cover; width: 100%; height: 100%;">
                    @else
                        <span style="line-height: 1.25; text-align: center;">FOTO<br>3x4<br>(Tidak Tersedia)</span>
                    @endif
                </div>
            </div>

            <div class="signature-area" style="margin-top: auto; margin-bottom: 16px; text-align: center;">
                <p style="margin-bottom: 4px; font-size: 12px; color: #4b5563;">Tanda Tangan:</p>
                <div style="width: 128px; height: 64px; margin-left: auto; margin-right: auto; border: 1px solid #d1d5db; background-color: #f9fafb;
                    background-image: url('data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'100%\' height=\'100%\' opacity=\'0.1\'><text x=\'50%\' y=\'50%\' font-family=\'Arial\' font-size=\'10\' fill=\'gray\' text-anchor=\'middle\' dominant-baseline=\'middle\'>Signature Here</text></svg>'); background-repeat: no-repeat; background-position: center;"></div>
            </div>

            <div class="validity" style="padding-bottom: 8px; margin-top: auto; font-size: 12px; text-align: center;">
                <p style="margin-bottom: 0; font-weight: 600; color: #374151;">Berlaku Hingga:</p>
                <p style="margin-top: 0; font-size: 18px; font-weight: bold; color: #1d4ed8;">{{ $ktpData['berlaku_hingga'] ?? 'N/A' }}</p>
            </div>
        </section>

        <section class="right-section" style="width: 66.666667%; padding-top: 4px; padding-left: 16px;">
            <div class="personal-info" style="line-height: 1.5; font-size: 14px; color: #111827;">

                <div style="display: flex; align-items: baseline;">
                    <span style="width: 128px; font-weight: 600;">NIK</span>
                    <span style="flex: 1;">: {{ $ktpData['nik'] ?? '' }}</span>
                </div>

                <div style="display: flex; align-items: baseline;">
                    <span style="width: 128px; font-weight: 600;">Nama</span>
                    <span style="flex: 1;">: {{ $ktpData['nama'] ?? '' }}</span>
                </div>

                <div style="display: flex; align-items: baseline;">
                    <span style="width: 128px; font-weight: 600;">Tempat/Tgl Lahir</span>
                    <span style="flex: 1;">: {{ $ktpData['tempat_lahir'] ?? '' }}, {{ $ktpData['tanggal_lahir'] ?? '' }}</span>
                </div>

                <div style="display: flex; align-items: baseline;">
                    <span style="width: 128px; font-weight: 600;">Jenis Kelamin</span>
                    <span style="flex: 1;">: {{ $ktpData['jenis_kelamin'] ?? '' }}</span>
                </div>

                <div style="display: flex; align-items: baseline;">
                    <span style="width: 128px; font-weight: 600;">Gol. Darah</span>
                    <span style="flex: 1;">: {{ $ktpData['golongan_darah'] ?? '' }}</span>
                </div>

                <div style="display: flex; align-items: baseline;">
                    <span style="width: 128px; font-weight: 600;">Alamat</span>
                    <span style="flex: 1;">: {{ $ktpData['alamat'] ?? '' }}</span>
                </div>

                <div style="display: flex; align-items: baseline;">
                    <span style="width: 128px; font-weight: 600;">RT/RW</span>
                    <span style="flex: 1;">: {{ $ktpData['rt_rw'] ?? '' }}</span>
                </div>

                <div style="display: flex; align-items: baseline;">
                    <span style="width: 128px; font-weight: 600;">Kel/Desa</span>
                    <span style="flex: 1;">: {{ $ktpData['kelurahan_desa'] ?? '' }}</span>
                </div>

                <div style="display: flex; align-items: baseline;">
                    <span style="width: 128px; font-weight: 600;">Kecamatan</span>
                    <span style="flex: 1;">: {{ $ktpData['kecamatan'] ?? '' }}</span>
                </div>

                <div style="display: flex; align-items: baseline;">
                    <span style="width: 128px; font-weight: 600;">Agama</span>
                    <span style="flex: 1;">: {{ $ktpData['agama'] ?? '' }}</span>
                </div>

                <div style="display: flex; align-items: baseline;">
                    <span style="width: 128px; font-weight: 600;">Status Perkawinan</span>
                    <span style="flex: 1;">: {{ $ktpData['status_perkawinan'] ?? '' }}</span>
                </div>

                <div style="display: flex; align-items: baseline;">
                    <span style="width: 128px; font-weight: 600;">Pekerjaan</span>
                    <span style="flex: 1;">: {{ $ktpData['pekerjaan'] ?? '' }}</span>
                </div>

                <div style="display: flex; align-items: baseline;">
                    <span style="width: 128px; font-weight: 600;">Kewarganegaraan</span>
                    <span style="flex: 1;">: {{ $ktpData['kewarganegaraan'] ?? '' }}</span>
                </div>
            </div>

            <div class="issue-info" style="margin-top: 24px; font-size: 12px; text-align: right; color: #374151;">
                <p style="margin-bottom: 0;">
                    @php
                        $tanggalDisahkan = $ktpData['tanggal_disahkan'] ?? \Carbon\Carbon::now('Asia/Jakarta')->translatedFormat('d F Y');
                    @endphp
                    Semarang, {{ $tanggalDisahkan }}
                </p>
            </div>
        </section>
    </main>

    <div class="security-elements" style="position: absolute; inset: 0px; pointer-events: none;">
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); opacity: 0.05; z-index: 0;">
            <span style="color: #1e40af; font-size: 128px;">🦅</span>
        </div>

        <div style="position: absolute; top: 0; right: 0; width: 32px; height: 100%; background-image: linear-gradient(to bottom, #fde047 0%, #86efad 50%, #60a5fa 100%); opacity: 0.3; z-index: 1;"></div>
    </div>

    <div style="position: absolute; width: 32px; height: 24px; background-color: #facc15; border: 1px solid #eab308; border-radius: 0.125rem; bottom: 16px; left: 32px; z-index: 2;"></div>
</div>

<style>
    /* This style block still contains the essential @media print rules */
    @media print {
        .ktp-container {
            width: 85.6mm !important;
            height: 54mm !important;
            transform: scale(1) !important;
            transform-origin: top left !important;
            box-shadow: none !important;
            border: none !important;
            margin: 0 !important;
        }
        .ktp-content {
            box-shadow: none !important;
        }
        /* Adjust margins and padding for print if needed (converted from Tailwind values) */
        .p-4 { padding: 1rem !important; }
        .mx-4 { margin-left: 1rem !important; margin-right: 1rem !important; }
        .py-2 { padding-top: 0.5rem !important; padding-bottom: 0.5rem !important; }
        .pr-4 { padding-right: 1rem !important; }
        .pl-4 { padding-left: 1rem !important; }
        .mb-4 { margin-bottom: 1rem !important; }
        .mt-2 { margin-top: 0.5rem !important; }
        .mt-8 { margin-top: 2rem !important; }

        @page {
            size: 85.6mm 54mm;
            margin: 0;
        }
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }
</style>

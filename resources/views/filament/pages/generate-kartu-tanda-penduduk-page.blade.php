<x-filament-panels::page>
    <div class="ktp-container mx-auto" style="width: 856px; height: 540px; background: linear-gradient(135deg, #1e40af 0%, #3b82f6 50%, #60a5fa 100%); border-radius: 12px; position: relative; font-family: Arial, sans-serif; overflow: hidden;">

        <!-- Header Section -->
        <div class="ktp-header text-center py-2">
            <div class="text-white font-bold text-lg">REPUBLIK INDONESIA</div>
            <div class="text-yellow-300 font-bold text-2xl tracking-wider">KARTU TANDA PENDUDUK</div>
        </div>

        <!-- Main Content Area -->
        <div class="ktp-content flex p-4 bg-white mx-4 rounded-lg" style="height: 420px;">

            <!-- Left Section - Photo and Additional Info -->
            <div class="left-section w-1/3 pr-4">
                <!-- Photo Area -->
                <div class="photo-container mb-4">
                    <div class="w-32 h-40 bg-gray-200 border-2 border-gray-400 flex items-center justify-center text-gray-500 text-sm">
                        <span>FOTO<br>3x4</span>
                    </div>
                </div>

                <!-- Signature Area -->
                <div class="signature-area mt-8">
                    <div class="text-xs mb-1">Tanda Tangan:</div>
                    <div class="w-32 h-16 border border-gray-300 bg-gray-50"></div>
                </div>

                <!-- Validity Period -->
                <div class="validity mt-4 text-xs">
                    <div class="font-semibold">Berlaku Hingga:</div>
                    <div class="text-lg font-bold">SEUMUR HIDUP</div>
                </div>
            </div>

            <!-- Right Section - Personal Information -->
            <div class="right-section w-2/3 pl-4">
                <div class="personal-info space-y-2 text-sm">

                    <!-- NIK -->
                    <div class="flex">
                        <div class="w-32 font-semibold">NIK</div>
                        <div class="flex-1">: 1234567890123456</div>
                    </div>

                    <!-- Nama -->
                    <div class="flex">
                        <div class="w-32 font-semibold">Nama</div>
                        <div class="flex-1">: NAMA LENGKAP</div>
                    </div>

                    <!-- Tempat/Tgl Lahir -->
                    <div class="flex">
                        <div class="w-32 font-semibold">Tempat/Tgl Lahir</div>
                        <div class="flex-1">: JAKARTA, 01-01-1990</div>
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="flex">
                        <div class="w-32 font-semibold">Jenis Kelamin</div>
                        <div class="flex-1">: LAKI-LAKI</div>
                    </div>

                    <!-- Golongan Darah -->
                    <div class="flex">
                        <div class="w-32 font-semibold">Gol. Darah</div>
                        <div class="flex-1">: O</div>
                    </div>

                    <!-- Alamat -->
                    <div class="flex">
                        <div class="w-32 font-semibold">Alamat</div>
                        <div class="flex-1">: JL. CONTOH NO. 123</div>
                    </div>

                    <!-- RT/RW -->
                    <div class="flex">
                        <div class="w-32 font-semibold">RT/RW</div>
                        <div class="flex-1">: 001/002</div>
                    </div>

                    <!-- Kel/Desa -->
                    <div class="flex">
                        <div class="w-32 font-semibold">Kel/Desa</div>
                        <div class="flex-1">: KELURAHAN CONTOH</div>
                    </div>

                    <!-- Kecamatan -->
                    <div class="flex">
                        <div class="w-32 font-semibold">Kecamatan</div>
                        <div class="flex-1">: KECAMATAN CONTOH</div>
                    </div>

                    <!-- Agama -->
                    <div class="flex">
                        <div class="w-32 font-semibold">Agama</div>
                        <div class="flex-1">: ISLAM</div>
                    </div>

                    <!-- Status Perkawinan -->
                    <div class="flex">
                        <div class="w-32 font-semibold">Status Perkawinan</div>
                        <div class="flex-1">: BELUM KAWIN</div>
                    </div>

                    <!-- Pekerjaan -->
                    <div class="flex">
                        <div class="w-32 font-semibold">Pekerjaan</div>
                        <div class="flex-1">: KARYAWAN SWASTA</div>
                    </div>

                    <!-- Kewarganegaraan -->
                    <div class="flex">
                        <div class="w-32 font-semibold">Kewarganegaraan</div>
                        <div class="flex-1">: WNI</div>
                    </div>
                </div>

                <!-- Issue Location and Date -->
                <div class="issue-info mt-6 text-xs">
                    <div class="text-right">
                        <div>JAKARTA, 01-01-2023</div>
                        <div class="mt-8 font-semibold">KEPALA DINAS KEPENDUDUKAN</div>
                        <div class="font-semibold">DAN PENCATATAN SIPIL</div>
                        <div class="mt-8">_________________</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Security Features -->
        <div class="security-elements absolute inset-0 pointer-events-none">
            <!-- Garuda Watermark -->
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 opacity-5">
                <div class="text-8xl">🦅</div>
            </div>

            <!-- Holographic Strip Simulation -->
            <div class="absolute right-0 top-0 w-8 h-full bg-gradient-to-b from-yellow-200 via-green-200 to-blue-200 opacity-30"></div>
        </div>

        <!-- Chip Simulation -->
        <div class="absolute bottom-4 left-8 w-8 h-6 bg-yellow-400 rounded-sm border border-yellow-600"></div>
    </div>

    <!-- Additional Styling -->
    <style>
        .ktp-container {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            border: 2px solid #1e40af;
        }

        .ktp-content {
            background: linear-gradient(to bottom, #ffffff 0%, #f8fafc 100%);
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .personal-info div {
            line-height: 1.4;
        }

        .photo-container div {
            background: linear-gradient(45deg, #f3f4f6 25%, transparent 25%),
                        linear-gradient(-45deg, #f3f4f6 25%, transparent 25%),
                        linear-gradient(45deg, transparent 75%, #f3f4f6 75%),
                        linear-gradient(-45deg, transparent 75%, #f3f4f6 75%);
            background-size: 10px 10px;
            background-position: 0 0, 0 5px, 5px -5px, -5px 0px;
        }

        @media print {
            .ktp-container {
                width: 85.6mm;
                height: 54mm;
                transform: scale(0.8);
                transform-origin: top left;
            }
        }
    </style>

    <!-- Form for Data Input (Optional) -->
    <div class="mt-8 bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold mb-4">Input Data KTP</h3>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium mb-1">NIK</label>
                <input type="text" class="w-full border rounded px-3 py-2" maxlength="16" placeholder="1234567890123456">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Nama Lengkap</label>
                <input type="text" class="w-full border rounded px-3 py-2" placeholder="Nama Lengkap">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Tempat Lahir</label>
                <input type="text" class="w-full border rounded px-3 py-2" placeholder="Jakarta">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Tanggal Lahir</label>
                <input type="date" class="w-full border rounded px-3 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Jenis Kelamin</label>
                <select class="w-full border rounded px-3 py-2">
                    <option>LAKI-LAKI</option>
                    <option>PEREMPUAN</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Golongan Darah</label>
                <select class="w-full border rounded px-3 py-2">
                    <option>A</option>
                    <option>B</option>
                    <option>AB</option>
                    <option>O</option>
                </select>
            </div>
            <div class="col-span-2">
                <label class="block text-sm font-medium mb-1">Alamat</label>
                <textarea class="w-full border rounded px-3 py-2" rows="2" placeholder="Alamat lengkap"></textarea>
            </div>
        </div>
        <div class="mt-4 flex gap-2">
            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Generate KTP</button>
            <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Print</button>
        </div>
    </div>
</x-filament-panels::page>

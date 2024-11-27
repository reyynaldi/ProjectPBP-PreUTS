@include('header')

<div class="flex flex-col h-full">
  <x-navbar/>
  <div class="flex items-center py-3 ml-6">
    <div class="font-bold text-lg md:text-xl pl-4 py-1 px-1">
        <a href = "{{route('dosen.perwalian')}}">Perwalian > </a> 
    </div>
    <div class="text-lg md:text-xl py-1">
      Detail
    </div>
  </div>

  <!-- Profile Section -->
  <div class="container mx-auto py-8">
    <div class="col-span-3 lg:col-span-3 flex flex-col lg:flex-row p-6 lg:p-8 border-2 border-[#80747475] rounded-lg gap-3 shadow-md">
      <!-- Foto Profile -->
      <div class="p-5 flex justify-center lg:justify-start">
          <img class="rounded-full w-36 h-36 lg:w-52 lg:h-52 object-cover" src="/img/Pasfoto.png" alt="pasfoto">
      </div>
      <!-- Info Profile -->
      {{-- <div class="flex flex-col justify-center gap-2 text-center lg:text-left">
          <h1 class="text-5xl text-bold text-gray-600"> {{$mahasiswa->nama}} </h1>
          <p class="text-lg text-gray-600"> {{$mahasiswa->nim}} </p>
          <p class="text-lg text-gray-600"> </p>
          <p class="text-lg text-gray-600"> </p>
          <p class="text-lg text-blue-500">  </p>
      </div> --}}

      {{-- Info Mahasiswa --}}
      <div class="bg-gray-50 rounded-lg p-6 grid grid-cols-2 gap-x-96 gap-y-2">
        <div class="flex px-2 gap-x-20">
          <div class="w-60 text-gray-600">Nama Mahasiswa</div>
          <div class="w-60">{{$mahasiswa->nama}}</div>
        </div>
        <div class="flex px-2 gap-x-20">
          <div class="w-40 text-gray-600">Status Mahasiswa</div>
          <div>{{Str::apa($mahasiswa->status)}}</div>
        </div>
        <div class="flex px-2 gap-x-20">
          <div class="w-40 text-gray-600">NIM</div>
          <div>{{$mahasiswa->nim}}</div>
        </div>
        <div class="flex px-2 gap-x-20">
          <div class="w-40 text-gray-600">Program Studi</div>
          <div>{{$mahasiswa->prodi->strata}} - {{$mahasiswa->prodi->nama}}</div>
        </div>
        <div class="flex px-2 gap-x-20">
          <div class="w-40 text-gray-600">Tahun Masuk</div>
          <div>{{$mahasiswa->tahun_masuk}}</div>
        </div>
        <div class="flex px-2 gap-x-20">
          <div class="w-40 text-gray-600">Semester</div>
          <div>{{$mahasiswa->semester}}</div>
        </div>
        <div class="flex px-2 gap-x-20">
          <div class="w-40 text-gray-600">IPK</div>
          <div>{{$mahasiswa->ipk}}</div>
        </div>
        <div class="flex px-2 gap-x-20">
          <div class="w-40 text-gray-600">SKS</div>
          <div>2</div>
        </div>
      </div>
    </div>

    <!-- Tabbed Section -->
    <div class="max-w-7xl mx-auto px-4 py-6" x-data="{ activeTab: 'irs' }"">
      <!-- Tab Headers -->
      <div class="flex border-b">
          <button 
              class="px-6 py-3 text-sm font-medium rounded-t-lg" 
              :class="{ 'bg-white border-t border-x text-blue-600': activeTab === 'irs', 'bg-gray-50 text-gray-600 hover:text-gray-900': activeTab !== 'irs' }"
              @click="activeTab = 'irs'"
          >
              Isian Rencana Studi (IRS)
          </button>
          <button 
              class="px-6 py-3 text-sm font-medium rounded-t-lg" 
              :class="{ 'bg-white border-t border-x text-blue-600': activeTab === 'khs', 'bg-gray-50 text-gray-600 hover:text-gray-900': activeTab !== 'khs' }"
              @click="activeTab = 'khs'"
          >
              Kartu Hasil Studi (KHS)
          </button>
          <button 
              class="px-6 py-3 text-sm font-medium rounded-t-lg" 
              :class="{ 'bg-white border-t border-x text-blue-600': activeTab === 'history', 'bg-gray-50 text-gray-600 hover:text-gray-900': activeTab !== 'history' }"
              @click="activeTab = 'history'"
          >
              Riwayat IRS
          </button>
      </div>

      
      <!-- Tab Content IRS -->
      <div x-show="activeTab === 'irs'" class="bg-white p-6 rounded-b-lg border-x border-b">
        {{--  <!-- IRS Content --> --}}
        <div class="overflow-x-auto">
          <table class="w-full border-collapse border">
            <thead>
              <tr id='irs-aju-header' class="bg-gray-50 hidden">
                <th class="px-4 py-3 text-left border">Kode MK</th>
                <th class="px-4 py-3 text-left border">Mata Kuliah</th>
                <th class="px-4 py-3 text-center border">SKS</th>
                <th class="px-4 py-3 text-center border">Kelas</th>
                <th class="px-4 py-3 text-center border">Hari</th>
                <th class="px-4 py-3 text-center border">Waktu</th>
                <th class="px-4 py-3 text-center border">Ruang</th>
                <th class="px-4 py-3 text-center border">Dosen</th>
              </tr>
            </thead>
            <tbody id="list-jadwal-body">
              <!-- Table rows will be dynamically injected by AJAX -->
              <tr>
                <td colspan="8" class="text-center px-4 py-3 border">Loading...</td>
              </tr>
            </tbody>
            <tfoot id="list-jadwal-footer">
              <!-- Footer for total SKS will be dynamically injected by AJAX -->
            </tfoot>
          </table>
        </div>
      </div>

      <!-- Tab Content KHS -->
      <div x-show="activeTab === 'khs'" class="bg-white p-6 rounded-b-lg border-x border-b">
        <!-- KHS Content -->
        <p>KHS content goes here...</p>
      </div>

      <!-- Tab Content History IRS -->
      <div x-show="activeTab === 'history'" class="bg-white p-6 rounded-b-lg border-x border-b">
        <div id="history-irs-container" class="bg-white rounded-b-lg border-x border-b">
            <!-- Content will be dynamically injected here -->
            <div class="text-center p-4">Loading riwayat IRS...</div>
        </div>
      </div>
      
    </div> {{-- TAbbed --}}

  </div>
</div>


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function () {
      let nim = "{{ $nim }}"; // Pass 'nim' dynamically from Blade
      $.ajax({
          url: "{{ url('api/fetch-aju-irs') }}",
          type: "POST",
          data: {
              nim: nim,
              _token: '{{ csrf_token() }}'
          },
          dataType: 'json',
          success: function (response) {
              // Clear the table body and footer placeholders
              $('#list-jadwal-body').empty();
              $('#list-jadwal-footer').empty();
              let ListJadwal = response.aju_irs;
              // Check if ListJadwal exists and has data
              if (ListJadwal && ListJadwal.length > 0) {
                  $('#irs-aju-header').removeClass('hidden');
                  let totalSKS = 0; // Initialize total SKS counter
                  let rows = ''; // Variable to hold all table rows
                  // Iterate through ListJadwal and create table rows
                  ListJadwal.forEach(jadwals => {
                    rows += `<tr>
                      <td class="px-4 py-3 border">${jadwals.jadwal.kode_mk}</td>
                                  <td class="px-4 py-3 border">${jadwals.jadwal.mata_kuliah.nama_mk}</td>
                                  <td class="px-4 py-3 text-center border">${jadwals.jadwal.mata_kuliah.sks}</td>
                                  <td class="px-4 py-3 text-center border">${jadwals.jadwal.kode_kelas}</td>
                                  <td class="px-4 py-3 text-center border">${jadwals.jadwal.hari}</td>
                                  <td class="px-4 py-3 text-center border">${jadwals.jadwal.jam_mulai} - ${jadwals.jadwal.jam_selesai}</td>
                                  <td class="px-4 py-3 text-center border">${jadwals.jadwal.ruang}</td>
                                  <td class="px-4 py-3 border"></td> 
                              </tr>`;
                      totalSKS += jadwals.jadwal.mata_kuliah.sks; // Accumulate SKS
                  });
                  // ${jadwals.jadwal.dosen}
                  // Append rows to the table body
                  $('#list-jadwal-body').html(rows);

                  // Append total SKS to the footer
                  let footer = `<tr class="bg-gray-100">
                                  <td colspan="2" class="px-4 py-3 text-right font-bold border">Total SKS</td>
                                  <td class="px-4 py-3 text-center font-bold border">${totalSKS}</td>
                                  <td colspan="5" class="px-4 py-3 border"></td>
                                </tr>`;
                  $('#list-jadwal-footer').html(footer);
              } else {
                  // If no schedule is found
                  $('#list-jadwal-body').html('<tr><td colspan="8" class="text-center px-4 py-3 border">Tidak ada ajuan IRS.</td></tr>');
              }
          },
          error: function (xhr, status, error) {
              console.error("Error:", error);
              alert("Terjadi kesalahan saat mengambil data status mahasiswa.");
          }
      });
  });


</script>

<script>
  $(document).ready(function () {
      let nim = "{{ $nim }}"; // Pass 'nim' dynamically from Blade

      $.ajax({
        url: "{{ url('api/fetch-history-irs') }}",
        type: "POST",
        data: {
            nim: nim,
            _token: '{{ csrf_token() }}'
        },
        dataType: 'json',
        success: function (response) {
            let historyIRS = response.history_irs;
            let historyContent = '';
            
            // Check if historyIRS exists and has data
            if (historyIRS && historyIRS.length > 0) {
                historyIRS.forEach((semester, index) => {
                  console.log(semester);
                  
                    historyContent += `
                    <div class="border-b last:border-b-0">
                        <!-- Semester Header -->
                        <button 
                            onclick="toggleSemester(${semester.semester})"
                            class="w-full px-6 py-4 flex items-center justify-between hover:bg-gray-50"
                        >
                            <div class="flex items-center gap-4">
                                <span class="font-medium">Semester ${semester.semester}</span>
                                <span class="text-gray-600">${semester.tahun_akademik}</span>
                            </div>
                            <svg 
                                id="semester-icon-${semester.semester}"
                                class="transform transition-transform text-gray-400"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                width="20"
                                height="20"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                            </svg>
                        </button>
                    
                        <!-- Expandable Content -->
                        <div 
                            id="semester-content-${semester.semester}"
                            class="p-6 border-t bg-gray-50 hidden"
                        >
                            <table class="w-full bg-white">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th class="px-4 py-3 text-left border">Kode MK</th>
                                        <th class="px-4 py-3 text-left border">Mata Kuliah</th>
                                        <th class="px-4 py-3 text-center border">SKS</th>
                                        <th class="px-4 py-3 text-center border">Kelas</th>
                                        <th class="px-4 py-3 text-center border">Hari</th>
                                        <th class="px-4 py-3 text-center border">Waktu</th>
                                        <th class="px-4 py-3 text-center border">Ruang</th>
                                        <th class="px-4 py-3 text-left border">Dosen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ${generateJadwalRows(semester.jadwal)}
                                </tbody>
                                <tfoot>
                                    <tr class="bg-gray-50">
                                        <td colspan="2" class="px-4 py-3 font-medium border">Total SKS</td>
                                        <td class="px-4 py-3 text-center font-medium border">${semester.total_sks}</td>
                                        <td colspan="5" class="border"></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>`;
                });

                $('#history-irs-container').html(historyContent);
            } else {
                // If no history is found
                $('#history-irs-container').html('<div class="text-center p-4">Tidak ada riwayat IRS.</div>');
            }
        },
        error: function (xhr, status, error) {
            console.error("Error:", error);
            alert("Terjadi kesalahan saat mengambil riwayat IRS.");
        }
    });
  });

  // Function to generate jadwal rows
  function generateJadwalRows(jadwal) {
      return jadwal.map(item => `
          <tr>
              <td class="px-4 py-3 border">${item.kode_mk}</td>
              <td class="px-4 py-3 border">${item.nama_mk}</td>
              <td class="px-4 py-3 text-center border">${item.sks}</td>
              <td class="px-4 py-3 text-center border">${item.kode_kelas}</td>
              <td class="px-4 py-3 text-center border">${item.hari}</td>
              <td class="px-4 py-3 text-center border">${item.jam_mulai} - ${item.jam_selesai}</td>
              <td class="px-4 py-3 text-center border">${item.ruang}</td>
              <td class="px-4 py-3 border">${item.dosen}</td>
          </tr>
      `).join('');
  }

  // Function to toggle semester expand/collapse
  function toggleSemester(semesterNumber) {
      const contentEl = $(`#semester-content-${semesterNumber}`);
      const iconEl = $(`#semester-icon-${semesterNumber}`);

      contentEl.toggleClass('hidden');
      iconEl.toggleClass('rotate-180');
  }
</script>
@include('footer')
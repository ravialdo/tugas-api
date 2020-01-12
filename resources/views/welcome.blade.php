<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
      
         <!-- JS -->
         <script src="{{ asset('js/app.js') }}"></script>
         <!-- JS Sweet Alert -->
         <script src="{{ asset('js/sweetalert.min.js') }}"></script>
         
         <!-- Bootstrap -->
         <link href="{{ asset('css/app.css') }}" rel="stylesheet">
         <!-- Font Awesome -->
         <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
         
    </head>
    <body>
             
            @include('sweet::alert')
            
            <div class="container my-2">
               <div class="h1 border-bottom">
                  <i class="fa fa-street-view"></i> <span class="text-success">E</span>-Siswa
               </div>
               <button type="button" class="btn btn-success my-2" data-toggle="modal" data-target="#tambahData">
                  <i class="fa fa-user-plus"></i> Tambah Data Siswa
               </button>
               
               <div class="modal" id="tambahData">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title text-uppercase">
                           <i class="fa fa-user-plus text-success"></i> Tambah Data Siswa
                        </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           
                           <form method="post" action="/students">
                           
                              @csrf
                              
                              <div class="form-group">
                                 <input type="number" class="form-control" name="nis" placeholder="NIS *">                               
                              </div>
                              
                              <div class="form-group">
                                 <input type="text" class="form-control" name="nama_siswa" placeholder="Nama Siswa *" required>
                              </div>
                              
                              <div class="form-group">
                                 <input type="text" class="form-control"  name="kelas" placeholder="Kelas *" required>
                              </div>
                              
                              <div class="form-group">
                                 <textarea class="form-control" rows="3"  name="alamat" placeholder="Alamat *" required></textarea>
                              </div>
                              
                              <div class="form-group">
                                 <input type="number" class="form-control" name="nomor_hp" placeholder="Nomor Hp *" required>
                              </div>                                            
                           
                       </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                           <i class="fa fa-times"></i> Tutup
                        </button>
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-check"></i> Simpan
                        </button>
                       </div>
                     
                     </form>
                    </div>
                 </div>
               </div>
               
               
               <div class="text-right"> Total Data : {{ count($total_data) }}</div>                            
                  
                     <table class="table table-striped table-responsive-sm">
                  <thead class="table-success">
                                       
                     <th>
                        NIS
                     </th>
                     <th>
                        Nama Siswa
                     </th>
                     <th>
                        Kelas
                     </th>
                     <th>
                        Alamat
                     </th>
                     <th>
                        Nomor Hp
                     </th>
                     <th>
                        Aksi
                     </th>

                  </thead>
                  <tbody>
                     @if(count($students) > 0)
                                                                     
                        @foreach($students as $student)
                     <tr>
                     
                     <td>
                        {{ $student->nis }}
                     </td>
                     <td>
                        {{ $student->student_name }}
                     </td>
                     <td>
                        {{ $student->class }}
                     </td>
                     <td>
                        {{ $student->address }}
                     </td>
                     <td>
                        {{ $student->number_phone }}
                     </td>
                     <td>
                     
                        <button type="button" class="btn btn-primary my-1" data-toggle="modal" data-target="#editData{{$student->id}}">
                           <i class="fa fa-pencil"></i>
                        </button>
                        
                        <div class="modal" id="editData{{$student->id}}">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title text-uppercase">
                           <i class="fa fa-pencil text-primary"></i> Edit Data Siswa
                        </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           
                           <form method="post" action="students/{{ $student->id }}">
                           
                              @csrf
                              @method('put')
                              
                              <div class="form-group">
                                 <input type="number" class="form-control" name="nis" placeholder="NIS *" value="{{ $student->nis }}">
                              </div>
                              
                              <div class="form-group">
                                 <input type="text" class="form-control" name="nama_siswa" placeholder="Nama Siswa *" value="{{ $student->student_name }}">
                              </div>
                              
                              <div class="form-group">
                                 <input type="text" class="form-control"  name="kelas" placeholder="Kelas *" value="{{ $student->class }}">
                              </div>
                              
                              <div class="form-group">
                                 <textarea type="number" class="form-control"  rows="3" name="alamat" placeholder="Alamat *">{{ $student->address }}</textarea>
                              </div>
                              
                              <div class="form-group">
                                 <input class="form-control" name="nomor_hp" placeholder="Nomor Hp *" value="{{ $student->number_phone }}">
                              </div>                                            
                           
                       </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                           <i class="fa fa-times"></i> Tutup
                        </button>
                        <button type="submit" class="btn btn-success">
                           <i class="fa fa-check"></i> Simpan
                       </button>
                       </div>
                     
                     </form>
                    </div>
                 </div>
               </div>
               
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusData{{$student->id}}">
                           <i class="fa fa-trash"></i>
                        </button>
                        
                        <div class="modal" id="hapusData{{$student->id}}">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title text-uppercase">
                           <i class="fa fa-info-circle text-danger"></i> Peringatan
                         </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <p>Yakin ingin menghapus data siswa atas nama {{ $student->student_name }}, Penghapusan ini bersifat permanen!</p>
                       </div>                   
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                           <i class="fa fa-times"></i> Tutup
                        </button>
                        <form method="post" action="students/{{ $student->id }}">
                        
                           @csrf
                           @method('delete')
                         
                           <button type="submit" class="btn btn-success">
                              <i class="fa fa-check"></i> Yakin
                           </button>
                        
                        </form>
                       </div>                        
                      </div>
                    </div>
                 </div>
               </div>
               
                    </td>                     
                     </tr>
                     
                        @endforeach
                     
                  </tbody>
               </table>
                     @else
                        <div class="text-center text-dark">Tidak Ada Data Untuk Di Tampilkan!</div>
                      @endif
                     
                     <div class="row justify-content-center">
                        <div class="col-6 col-md-3">{{ $students->links() }}</div>
                     </div>
               
            </div>
            
            
              
    </body>
</html>

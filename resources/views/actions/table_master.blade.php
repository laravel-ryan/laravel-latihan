<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="40">No.</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th width="150">Aksi</th>
        </tr>
    </thead>
    <tbody>
        
        @if ($master->count() > 0) 
            @php
                $no = 1;
            @endphp
            @foreach ($master as $value)
                <tr>
                    <td>{{ $no++  }}</td>
                    <td>{{ $value->nama }}</td>
                    <td>{{ $value->alamat }}</td>
                    <td>
                        <button class="btn btn-info btn-sm" onclick="edit({{ $value->id }})"><i class="icon-inbox"></i></button>
                        <button href="" class="btn btn-danger btn-sm" onclick="hapus({{ $value->id }})"><i class="icon-trash"></i></button>
                    </td>
                </tr>

                
            @endforeach
        @else
            <tr>
                <td colspan="4" class="text-muted font-italic text-center">Data tidak ditemukan</td>
            </tr>
        @endif
    </tbody>
</table>
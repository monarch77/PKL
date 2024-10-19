<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;
    protected $table = 'claims';
    protected $fillable = [
        'user_id',
        'no_polis',
        'name',
        'tanggal_lahir',
        'no_hp',
        'gender',
        'pekerjaan',
        'id_type',
        'id_number',
        'issued_date',
        'issued_state',
        'issued_authority',
        'expired_date',
        'address_type',
        'provinsi',
        'kota_kabupaten',
        'kecamatan_kelurahan',
        'rt_rw',
        'kode_pos',
        'claim_type',
        'tanggal_kejadian',
        'nominal_claim',
        'deskripsi_kejadian',
        'dokumen_pendukung',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Filament\Resources\MemberResource\Pages;

use App\Filament\Resources\MemberResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;
use Filament\Actions\Action;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Illuminate\Support\Facades\Storage;
use App\Models\QrCodeFile;

class CreateMember extends CreateRecord
{
    protected static string $resource = MemberResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterCreate(): void
    {
        try {
            // Generate QR Code
            $this->generateQrCode($this->record);
            
            Notification::make()
                ->success()
                ->title('Anggota berhasil dibuat')
                ->body('Data anggota telah berhasil ditambahkan.')
                ->send();

        } catch (\Exception $e) {
            Notification::make()
                ->warning()
                ->title('Terjadi Kesalahan')
                ->body('Data berhasil disimpan tetapi terjadi masalah dalam pembuatan QR Code: ' . $e->getMessage())
                ->persistent()
                ->send();
        }
        
        $this->form->fill([]);
    }

    protected function generateQrCode($member)
    {
        // QR Code generation options
        $options = new QROptions([
            'quietZone' => 10,
            'outputType' => QRCode::OUTPUT_IMAGE_PNG,
            'eccLevel' => QRCode::ECC_L,
            'scale' => 5,
            'imageBase64' => false
        ]);

        // Generate QR Code image
        $qrCode = new QRCode($options);
        $qrImage = $qrCode->render($member->id_karyawan);
        
        // Create unique filename
        $filename = 'qr_' . $member->id . '_' . time() . '.png';
        $path = 'qrcodes/' . $filename;
        
        // Store QR Code in public storage
        Storage::disk('public')->put($path, $qrImage);
        
        // Create QR Code file record in database
        QrCodeFile::create([
            'member_id' => $member->id,
            'qr_code_path' => $path
        ]);
        
        return Storage::disk('public')->url($path);
    }

    protected function getCreateFormAction(): Action
    {
        return Action::make('create')
            ->label('Buat')
            ->submit('create')
            ->keyBindings(['mod+s']);
    }

    protected function getCreateAnotherFormAction(): Action
    {
        return Action::make('createAnother')
            ->label('Buat Lainnya')
            ->hidden();
    }
}
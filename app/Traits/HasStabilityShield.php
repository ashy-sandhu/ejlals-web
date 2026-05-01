<?php

namespace App\Traits;

use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

trait HasStabilityShield
{
    protected function handleRecordCreation(array $data): Model
    {
        try {
            return static::getModel()::create($data);
        } catch (QueryException $e) {
            Notification::make()
                ->title('Database Error')
                ->body('Could not create record. Possible duplicate or constraint violation.')
                ->danger()
                ->persistent()
                ->send();

            // Log the error for the admin
            \Log::error("StabilityShield Create Error: " . $e->getMessage());

            $this->halt();
        } catch (\Exception $e) {
            Notification::make()
                ->title('System Error')
                ->body('An unexpected error occurred during creation.')
                ->danger()
                ->persistent()
                ->send();

            \Log::error("StabilityShield Unexpected Create Error: " . $e->getMessage());

            $this->halt();
        }
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        try {
            $record->update($data);
            return $record;
        } catch (QueryException $e) {
            Notification::make()
                ->title('Update Error')
                ->body('Could not save changes. Check for duplicate values.')
                ->danger()
                ->persistent()
                ->send();

            \Log::error("StabilityShield Update Error: " . $e->getMessage());

            $this->halt();
        } catch (\Exception $e) {
            Notification::make()
                ->title('System Error')
                ->body('An unexpected error occurred while saving.')
                ->danger()
                ->persistent()
                ->send();

            \Log::error("StabilityShield Unexpected Update Error: " . $e->getMessage());

            $this->halt();
        }
    }
}

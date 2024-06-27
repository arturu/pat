<?php
/**
 * Nome applicativo: PAT
 * Licenza di utilizzo: GNU Affero General Public License» versione 3 e successive: https://spdx.org/licenses/AGPL-3.0-or-later.html
 */

namespace Model;

defined('_FRAMEWORK_') or exit('No direct script access allowed');

use System\Model;

/**
 * Modello per la tabella rel_sections_fo_regulations. Rappresenta la relazione tra le tabelle sections_fo e object_regulations
 */
class RelSectionsFoRegulationsModel extends Model
{
    protected $table = 'rel_sections_fo_regulations';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'sections_fo_id',
        'object_regulations_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}

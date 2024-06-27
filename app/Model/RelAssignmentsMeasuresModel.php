<?php
/**
 * Nome applicativo: PAT
 * Licenza di utilizzo: GNU Affero General Public License» versione 3 e successive: https://spdx.org/licenses/AGPL-3.0-or-later.html
 */

namespace Model;

use Illuminate\Database\Eloquent\Relations\Pivot;

defined('_FRAMEWORK_') or exit('No direct script access allowed');

/**
 * Modello per la tabella rel_assignments_measures. Rappresenta la relazione tra le tabelle object_assignments e object_measures
 */
class RelAssignmentsMeasuresModel extends Pivot
{
    protected $table = 'rel_assignments_measures';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'object_assignments_id',
        'object_measures_id',
        'created_at',
        'updated_at',
    ];
}

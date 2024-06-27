<?php
/**
 * Nome applicativo: PAT
 * Licenza di utilizzo: GNU Affero General Public License» versione 3 e successive: https://spdx.org/licenses/AGPL-3.0-or-later.html
 */

namespace Model;

use Illuminate\Database\Eloquent\Relations\Pivot;

defined('_FRAMEWORK_') or exit('No direct script access allowed');

/**
 * Modello per la tabella rel_contest_acts_public_in.
 * Rappresenta la relazione tra le tabelle object_contests_acts e le sezioni per il pubblica in
 */
class RelContestActsPublicIn extends Pivot
{
    protected $table = 'rel_contest_acts_public_in';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'contest_act_id',
        'public_in_id',
        'created_at',
        'updated_at'
    ];
}

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Movimientos Model
 *
 * @property \App\Model\Table\CategoriasTable&\Cake\ORM\Association\BelongsTo $Categorias
 *
 * @method \App\Model\Entity\Movimiento get($primaryKey, $options = [])
 * @method \App\Model\Entity\Movimiento newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Movimiento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Movimiento|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Movimiento saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Movimiento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Movimiento[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Movimiento findOrCreate($search, callable $callback = null, $options = [])
 */
class MovimientosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('movimientos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Categorias', [
            'foreignKey' => 'categorias_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('concepto')
            ->maxLength('concepto', 255)
            ->requirePresence('concepto', 'create')
            ->notEmptyString('concepto');

        $validator
            ->scalar('conceptoAmpliado')
            ->requirePresence('conceptoAmpliado', 'create')
            ->notEmptyString('conceptoAmpliado');

        $validator
            ->decimal('importe')
            ->requirePresence('importe', 'create')
            ->notEmptyString('importe');

        $validator
            ->date('fechaCtble')
            ->requirePresence('fechaCtble', 'create')
            ->notEmptyDate('fechaCtble');

        $validator
            ->scalar('archivo')
            ->maxLength('archivo', 255)
            ->requirePresence('archivo', 'create')
            ->notEmptyString('archivo');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['categorias_id'], 'Categorias'));

        return $rules;
    }




}

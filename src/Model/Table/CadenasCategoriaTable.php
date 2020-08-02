<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CadenasCategoria Model
 *
 * @property \App\Model\Table\CategoriasTable&\Cake\ORM\Association\BelongsTo $Categorias
 *
 * @method \App\Model\Entity\CadenasCategorium get($primaryKey, $options = [])
 * @method \App\Model\Entity\CadenasCategorium newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CadenasCategorium[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CadenasCategorium|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CadenasCategorium saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CadenasCategorium patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CadenasCategorium[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CadenasCategorium findOrCreate($search, callable $callback = null, $options = [])
 */
class CadenasCategoriaTable extends Table
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

        $this->setTable('cadenas_categoria');
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
            ->scalar('cadena')
            ->maxLength('cadena', 255)
            ->requirePresence('cadena', 'create')
            ->notEmptyString('cadena');

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

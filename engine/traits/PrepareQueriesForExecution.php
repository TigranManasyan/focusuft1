<?php


namespace engine\traits;


trait PrepareQueriesForExecution
{
    /**
     * @param array $attributes
     * @return string
     */
    protected function prepareAttributesForInsert(array $attributes): string
    {
        $sql = 'INSERT INTO %s (';
        $count=0;
        foreach ($attributes as $key => $value) {
            $count++;
            $sql .= ($count != count($attributes)) ? $key . ', ' : $key;
        }
        $sql .=  ') VALUES (';
        $count = 0;
        foreach ($attributes as  $value) {
            $count++;
            $sql .= ($count != count($attributes)) ? '?, ' : '?';
        }

        $sql .= ')';
        return $sql;
    }

    /**
     * @param array $attributes
     * @param $id
     * @return string
     */
    protected function prepareAttributesForUpdate(array $attributes, $id): string
    {
        $sql = 'UPDATE %s SET ';
        $count=0;
        foreach ($attributes as $key => $value) {
            $count++;
            $sql .= ($count != count($attributes)) ? $key . ' = ?, ' : $key . ' = ? ' ;

        }
        $sql .=  " WHERE id = $id";
        return $sql;
    }
}
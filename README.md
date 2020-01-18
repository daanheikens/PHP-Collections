# PHP-FI

### TODO:

1. Simplified (extensible) collection framework
   - Collection Interface extends Traversable, countable
   - Map (KeyValue store) Interface Map + Abstract
   - Set (acts as HashSet) Interface Set + Abstract extends collection
   - List extends Collection ArrayList extends AbstractList
   
2. Grant access to the Stream class from within the Collection and Map

3. Build the stream class which contains the functional interface methods

4. Build interfaces:
   - Predicate (filter, anonymous function)
   - Function (map, anonymous function)
   - ToIntFunction(mapToInt, anonymous function)
   - ToDoubleFunction(mapToDouble, anonymous function)

5. Check if we can use the Closure interface and thus allowing anonymous functions AND
callable objects
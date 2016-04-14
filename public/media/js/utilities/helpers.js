function _each(object, callback)
{
	for(var key in object)
		if(object.hasOwnProperty(key))
			callback.call(object, key, object[key]);
}
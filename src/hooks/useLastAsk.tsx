import React from 'react'
import { useEffect, useState } from 'react';

export const useLastAsk = () => {

  const [lastAsk, setLastAsk] = useState<string>('300')

  useEffect(() => {
    const options = {
      method: 'POST',
    };


    fetch('http://localhost:800/proyecto-pp/src/apis/lastAsk.php', options)
      .then(response => response.json())
      .then(response => setLastAsk(response))
      .catch(err => console.error(err));
  }, [])

  return lastAsk
}

function fun1(input) {
  if (input.length <= 1) {
    throw new Error("Invalid input");
  }
  let i = 0;
  let j = 1;
  let output = 0;
  let temp = 0;
  let vemp = 0;
  while (i < input.length - 1) {
    if (j >= input.length) {
      break;
    }
    if (input[i] === input[j]) {
      temp++;
      j++;
    } else {
      output++;
      let z = j;
      j++;
      while (j < input.length) {
        if (input[z] === input[j]) {
          vemp++;
          j++;
          if (j === input.length) {
            if (temp > vemp) {
              output += vemp;
            } else {
              output += temp;
            }
            break;
          }
        } else {
          if (temp > vemp) {
            output += vemp;
          } else {
            output += temp;
          }
          break;
        }
      }
      i = z;
      temp = vemp;
      vemp=0;
    }
  }
  return output;
}

console.log(fun1("00001111")); //output 4

/**
 * 
 00001111
 i   n  j

input: 00000000000000000000000001111111111100000000000000000101010101010
       i                        j          n
                                i          j
# of 0 = temp 25
# of 1 = vemp 11

 */

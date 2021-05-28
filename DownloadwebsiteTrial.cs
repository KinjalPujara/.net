using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Net;
using System.Text;
using System.Threading.Tasks;
using System.Web;

namespace DownloadWebsite
{
    class Program
    {
     
        static void Main(string[] args)
        {
            string WebsiteName = "https://tretton37.com//";
            string FolderPath = "E:\\DownloadedWebsite\\";
            DownloadHTTPDirectory(@WebsiteName, @FolderPath);
        }


        public static void DownloadHTTPDirectory(string url, string localPath)
        {
            HttpWebRequest listRequest = (HttpWebRequest)WebRequest.Create(url);
            listRequest.Method = WebRequestMethods.Http.Get;

            List<string> lines = new List<string>();

            using (HttpWebResponse listResponse = (HttpWebResponse)listRequest.GetResponse())
            using (Stream listStream = listResponse.GetResponseStream())
            using (StreamReader listReader = new StreamReader(listStream))
            {
                while (!listReader.EndOfStream)
                {
                    lines.Add(listReader.ReadLine());
                }
            }

            foreach (string line in lines)
            {
                string[] tokens =
                line.Split(new[] { ' ' }, 9, StringSplitOptions.RemoveEmptyEntries);
                string name = tokens[2].ToString();

                string validname = RemoveInvalidChars(name);
                string localFilePath = Path.Combine(localPath, validname);
                string fileUrl = url + validname;

                if (!Directory.Exists(localFilePath))
                {
                    Directory.CreateDirectory(localFilePath);
                }

                HttpWebRequest downloadRequest = (HttpWebRequest)WebRequest.Create(fileUrl);
                downloadRequest.Method = WebRequestMethods.Http.Get;

                using (HttpWebResponse downloadResponse =
                          (HttpWebResponse)downloadRequest.GetResponse())
                using (Stream sourceStream = downloadResponse.GetResponseStream())
                using (Stream targetStream = File.Create(localFilePath))
                {
                    byte[] buffer = new byte[10240];
                    int read;
                    while ((read = sourceStream.Read(buffer, 0, buffer.Length)) > 0)
                    {
                        targetStream.Write(buffer, 0, read);
                    }
                }
            }
        }

        public static string RemoveInvalidChars(string filename)
        {
            return string.Concat(filename.Split(Path.GetInvalidFileNameChars()));
        }
    }
}
